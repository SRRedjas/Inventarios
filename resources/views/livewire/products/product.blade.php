<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {
    public Product $product;
    public $name;
    public $description;
    public $status;

    public function mount()
    {
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->status = $this->product->status;
        $this->category_id = $this->product->category_id;
    }
}; ?>

<div class="p-2 md:w-2/3 mx-auto">
    <h2>{{__('Code')}}</h2>
    <div class="grid grid-cols-2 gap-2">
        <flux:input type='text' readonly value="{{$product->id}}" label="ID" />
        <flux:input type='text' readonly value="{{$product->code}}" label="CODIGO" />
    </div>
    <flux:separator class="my-2" />
    <div class="flex flex-col gap-2">
        <flux:input wire:model="name" label="NOMBRE DE PRODUCTO" />
        <flux:input wire:model="description" label="DESCRIPCION DE PRODUCTO" />



        <flux:radio.group wire:model="status" label="Estado del producto">
            <flux:radio value="1" label="Activo" />
            <flux:radio value="0" label="Inactivo" />
        </flux:radio.group>
        




    </div>
    

    <flux:separator  class="my-2"/>
    <h2 class='text-xl '>Unidades de medida</h2>

    <livewire:products.relate-uom :product="$product" />


</div>