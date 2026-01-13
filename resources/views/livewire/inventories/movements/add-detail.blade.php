<?php

use Livewire\Volt\Component;
use App\Models\Movement;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    public Movement $movement;
    public $code;
    
    public $product;


    public $name;
    public $uoms;

    public function codeSearch()
    {
        $product = Product::where('code','like','%'.$this->code.'%')
                            ->orWhere('codebar','=',$this->code)
                            ->first();

        if($product)
            {
                $this->name = $product->name;
                $this->product = $product;
                $this->uoms= $this->product->uoms()->get();
            }
        else{

            $this->reset(['product', 'name']);
            LivewireAlert::title('No encontrado')
                            ->error()
                            ->toast(true)
                            ->text('Producto no encontrado')
                            ->show();
        }
    }
}; ?>

<div class="flex flex-col gap-4">
    
    <flux:field>
        <flux:label>
            Codigo de Articulo o de barra
        </flux:label>
        <flux:error name="code" />
        <div class="flex flex-col sm:flex-row flex-nowrap  gap-4">
            <div class="flex">
                <flux:input wire:model="code"  wire:change="codeSearch"  placeholder="EQPO1" />
                <flux:button variant="primary" icon="magnifying-glass"></flux:button>
            </div>
            <flux:input wire:model="name" readonly placeholder="Nombre articulo"/>
            
        </div>
    </flux:field>

    @if($product)
    <flux:field>

        <flux:select wire:model="uom">
            <flux:select.option value="" >Seleccione unidad de medida</flux:select.option>
            @foreach($uoms as $uom)
                <flux:select.option value="{{$uom->id}}" >{{$uom->sym}} - {{$uom->name}}</flux:select.option>                
            @endforeach
        </flux:select>
    </flux:field>
    @endif
</div>
