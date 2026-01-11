<?php
namespace App\Services;

use App\Models\MovementSequence;
use App\Models\MovementType;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CorrelativoService
{
    public function next(string $movementCode, string $warehouseCode, int $year = null): array
    {
        $year = $year ?? now()->year;

        return DB::transaction(function () use ($movementCode, $warehouseCode, $year) {
            $movementType = MovementType::where('code', $movementCode)->firstOrFail();
            $warehouse    = Store::where('code', $warehouseCode)->firstOrFail();

            // Bloqueo pesimista para evitar carreras
            $sequence = MovementSequence::where([
                'movement_type_id' => $movementType->id,
                'warehouse_id'     => $warehouse->id,
                'year'             => $year,
            ])->lockForUpdate()->first();

            if (!$sequence) {
                $sequence = MovementSequence::create([
                    'movement_type_id' => $movementType->id,
                    'warehouse_id'     => $warehouse->id,
                    'year'             => $year,
                    'current_number'   => 0,
                ]);
                // Re-lock para asegurar consistencia en creación concurrente
                $sequence = MovementSequence::where('id', $sequence->id)->lockForUpdate()->first();
            }

            $sequence->current_number += 1;
            $sequence->save();

            $seqNumber = $sequence->current_number;

            // Construcción del correlativo (formato configurable)
            $correlativo = $this->buildCorrelativo(
                $movementType->code,
                $warehouse->code,
                $year,
                $seqNumber
            );

            return [
                'sequence_number' => $seqNumber,
                'correlativo'     => $correlativo,
                'movement_type_id'=> $movementType->id,
                'warehouse_id'    => $warehouse->id,
                'year'            => $year,
            ];
        }, 3); // reintentos ante deadlocks
    }

    protected function buildCorrelativo(string $mov, string $wh, int $year, int $seq): string
    {
        // Ej: SAL-ALM01-2026-000123
        return sprintf('%s-%s-%d-%06d', $mov, $wh, $year, $seq);
    }
}
