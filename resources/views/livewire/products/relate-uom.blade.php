<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use App\Models\Uom;

new class extends Component {

    public Product $product;
    public $filtro;
    

    public function mount(){
        

        
    }

    public function with(){
        $productId = $this->product->id;
        return ['not_related_uoms' =>  Uom::whereDoesntHave('products', function($query) use ($productId){
                            $query->where('product_id', $productId);
        }               )->where(function ($query){
                                    $query->where('sym', 'like', '%'.$this->filtro.'%')
                                    ->orWhere('name', 'like', '%'.$this->filtro.'%');
                                })->limit(5)->get()];
    }

    public function agregar($id){
        $this->product->uoms()->attach($id);
        
        LivewireAlert::title('Agregado con exito')->success()->show();
    }

    public function retirar($id){
        $this->product->uoms()->detach($id);
        
        LivewireAlert::title('Retirado con exito')->success()->show();
    }

}; ?>

<div>

    <div class="bg-white  dark:bg-zinc-800 p-4 rounded-md">
        <h3 class="bg-amber-500 text-white  dark:bg-amber-700 text-center">Actualmente se utiliza:</h3>

        <ul>
        @foreach($product->uoms()->get() as $uom) 
            <li class="py-2 flex justify-center md:justify-between">
                <span class="font-bold px-2"> {{$uom->sym}}  - {{$uom->name}}</span> <flux:button variant="danger" icon="link-slash" wire:click="retirar({{$uom->id}})"> Retirar</flux:button>
            </li>
        @endforeach
        </ul>



        <flux:modal.trigger  name="add_uom">
            <flux:button class="mt-4" icon="plus"  >Agregar Unidad de medida</flux:button>
        </flux:modal.trigger>


        <flux:modal name="add_uom" >

            <flux:input wire:model.live="filtro" placeholder="Simbolo o Nombre" label="Filtro"></flux:input> 

            
            @foreach($not_related_uoms as $uom)            
                <div class="p-8 flex justify-between gap-2.5 border-amber-300 border-b border-r mt-6 hover:border-b-4 hover:border-r-4 dark:hover:bg-zinc-700  transition" >  


                    
                    <flux:label>
                         {{$uom->sym}} - {{$uom->name}}
                    </flux:label>


                    <flux:button icon="plus" wire:click="agregar({{$uom->id}})" > Agregar </flux:button>

                </div>

            @endforeach

        </flux:modal>

    </div>
</div>