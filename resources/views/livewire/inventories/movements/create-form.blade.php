<?php

use Livewire\Volt\Component;
use App\Services\CorrelativeService;
use App\Models\Movement;
use App\Models\Store;
use App\Models\MovementType;
use App\Models\Transfer;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $type;

    public $movement_code;
    public $correlative;
    public $store_code;
    public $movement_date;
    public $comments;
    

    //filtros
    public $storeFilter;

    public function mount()
    {
        $this->movement_date = Carbon::now()->format('Y-m-d');
    }

    public function selectStore($id)
    {
        $store = Store::find($id);

        $this->store_code = $store->code;
    }

    public function createMovement(CorrelativeService $svc)
    {
        

        $validated = $this->validate([
            'movement_date' => 'required|date',
            'comments' => 'required|string',
            'movement_code' => 'required|string',
            'store_code' =>'required|string',


        ]);




        
         $movementData = $svc->next( $validated['movement_code'], $validated['store_code'], (int)date('Y', strtotime($validated['movement_date']))); 

         $this->correlative= $movementData['correlative'];
        

        //'correlative', 'status', 'comments', 'user_id', 'store_id', 'movement_type_id'
         
        Movement::create([ 
            'correlative'=>$movementData['correlative'],
            'status'=>'P',
            'comments'=>$validated['comments'],
            'movement_date'=>$validated['movement_date'],
            'user_id'=>Auth::user()->id,
            'store_id'=>$movementData['store_id'],
            'movement_type_id'=>$movementData['movement_type_id']
         ]);

        LivewireAlert::title('Correlativo creado')
                        ->success()
                        ->show();


        $this->redirectRoute('movements.edit',['corr'=>$this->correlative]);



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
                <flux:error name="movement_code" />
                <flux:label>
                    Seleccione tipo de movimiento:
                </flux:label>
                <flux:select wire:model="movement_code">
                    <flux:select.option value="">Seleccione un tipo de movimiento</flux:option>
                        @foreach ($movement_types as $movement_type)
                            <flux:select.option value="{{ $movement_type->code }}">{{ $movement_type->code }} -
                                {{ $movement_type->description }}</flux:option>
                        @endforeach

                </flux:select>


            </flux:field>
            <flux:field>
                <flux:error name="movement_date" />
                <flux:label>
                    Fecha de Movimiento
                </flux:label>

                <flux:input type="movement_date" wire:model="movement_date" />
            </flux:field>
            <flux:field>
                <flux:error name="store_code" />
                <flux:label>
                    Bodega
                </flux:label>


                <div class="flex gap-4 md:w-1/4">
                    <flux:input wire:model="store_code" />
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
                <flux:error name="comments" />
                <flux:label>
                    Observaciones
                </flux:label>
                <flux:textarea wire:model="comments" />
            </flux:field>

            <flux:button wire:click="createMovement">Generar correlativo</flux:button>

            <flux:field>
                <flux:error name="correlative" />
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
