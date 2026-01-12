<?php

use Livewire\Volt\Component;
use App\Services\CorrelativoService;
use App\Models\Movement;
use App\Models\Store;
use App\Models\MovementType;
use App\Models\Transfer;

new class extends Component {
    public $type;

    public $movementType;
    public $correlative;
    public $store;
    public $storeFilter;

    public function selectStore($id)
    {
        $tienda = Store::find($id);

        $this->store = $tienda->code;
    }

    public function with()
    {
        return [
            'movement_types' => MovementType::all(),
            'stores' => Store::when($this->storeFilter, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->storeFilter . '%')->orWhere('code', 'like', '%' . $this->storeFilter . '%');
                });
            })
                ->where('status', '=', 1)
                ->get(),
        ];
    }
}; ?>

<div>
    <div class="border-b p-2 shadow-md bg-emerald-300 dark:bg-green-700">
        <flux:radio.group wire:model.live.debounce.200ms="type" label="Seleccione el tipo de movimiento">
            <flux:radio value="m" label="Movimiento (Entrada/Salida/Ajuste)" />
            <flux:radio value="t" label="Transferencia (Entre bodegas)" />
        </flux:radio.group>
    </div>


    <div class="p-2 my-2 border-b ">
        @if ($type == 'm')
            <flux:field>
                <flux:error name="movementType" />
                <flux:label>
                    Seleccione tipo de movimiento:
                </flux:label>
                <flux:select>
                    <flux:select.option value="">Seleccione un tipo de movimiento</flux:option>
                        @foreach ($movement_types as $movement_type)
                            <flux:select.option value="{{ $movement_type->code }}">{{ $movement_type->code }} -
                                {{ $movement_type->description }}</flux:option>
                        @endforeach

                </flux:select>


            </flux:field>
            <flux:field>
                <flux:error name="Store" />
                <flux:label>
                    Bodega
                </flux:label>

                <div class="flex">
                    <flux:input wire:model="store" />
                    <flux:modal.trigger name="search-store">
                        <flux:button icon="magnifying-glass">Buscar Bodega</flux:button>
                    </flux:modal.trigger>
                </div>
                <flux:modal name="search-store">
                    <div class="w-full p-4  flex flex-col min-h-96 max-h-96 ">
                        <div class="w-48">
                            <flux:input wire:model.live="storeFilter" icon="magnifying-glass"
                                label="Buscar bodega nombre/codigo" />
                        </div>
                        @foreach ($stores as $store)
                            <div class="border-b p-2 cursor-pointer rounder-xl hover:bg-emerald-300 hover:dark:bg-green-700"
                                wire:click="selectStore({{ $store->id }})">
                                {{ $store->code }} - {{ $store->name }}
                            </div>
                        @endforeach

                    </div>
                </flux:modal>
            </flux:field>

            <flux:field>
                <flux:error name="Correlative" />
                <flux:label>
                    Correlativo
                </flux:label>
                <flux:input wire:model="correlative" readonly />

            </flux:field>
        @elseif($type == 't')
            Seleccione bodega de salida
        @endif
    </div>
</div>
