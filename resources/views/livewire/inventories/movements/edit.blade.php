<?php

use Livewire\Volt\Component;
use App\Models\Movement;

new class extends Component {
    public $movement;
    public $store;

    public function mount($corr)
    {
        $this->movement = Movement::where('correlative', '=', $corr)->firstorFail();
        $this->store = $this->movement->store()->first();
    }

    public function with(){
        return ['details'=> $this->movement->details()->get()];
    }
}; ?>

<div>
    <div class="flex flex-col sm:flex-row justify-between items-center border-b-2  p-3">
        <div class="sm:grid grid-cols-2">
            <h3 class="">Correlativo de Movimiento: </h3><b>{{ $movement->correlative }}</b>
            <h3 class="">Bodega de movimiento: </h3><b>{{ $store->code }} - {{ $store->name }}</b>
            <h3 class="">Fecha de movimiento: </h3><b>{{ $movement->movement_date }}</b>
        </div>
        <div>
            <h3>Estado : 
                @switch($movement->status)
                @case('P')
                    <flux:button variant='primary' color="amber">Pendiente</flux:button>
                    @break
                @case('A')
                    <flux:button variant='primary' color="green">Activo</flux:button>
                    @break
                @case('I')
                    <flux:button variant='primary' color="red">Inactivo</flux:button>
                    @break
                @endswitch
            </h3>
        </div>
    </div>

    @if($movement->status == 'P')

        <livewire:inventories.movements.add-detail :movement="$movement" />

    @endif





</div>
