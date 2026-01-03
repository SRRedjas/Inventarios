<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


new class extends Component {
    use WithFileUploads;
    public Product $product;
    public $name;
    public $description;
    public $img;
    public $category_id;
    public $status;


    public function updateProduct()
    {
        $validated = $this->validate(
            [
                
                'name'=>'required|string',
                'description'=>'required|string',
                'img'=>'nullable|image',
                'category_id'=>'required|integer',
                'status'=>'required|boolean'
            ]
        );

        
        if($this->img){
            $validated["img"] = $this->img->store(path:'products');

            if($this->product->img){
                Storage::delete($this->product->img);
            }
        
        }

        if($this->product->img){
            $validated["img"]= $this->product->img;
        }

        $this->product->update($validated);

        LivewireAlert::title('Informacion actualizada')
                        ->success()
                        ->show();
        

    }
    public function mount()
    {
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->status = $this->product->status;
        $this->category_id = $this->product->category_id;
    }

    public function with(){
        return ['categories'=>Category::all()];
    }
}; ?>

<div class="p-2  mx-auto dark:bg-zinc-900">
    <div class="block  md:flex justify-around items-center">
        <div class="md:p-4">
            <h2 class="font-bold text-center">{{ __('Product') }}</h2>
            <div class="grid grid-cols-2 gap-2 ">
                <flux:input type='text' readonly value="{{ $product->id }}" label="ID" />
                <flux:input type='text' readonly value="{{ $product->code }}" label="CODIGO" />
            </div>


            <flux:separator class="my-2" />
            <div class="flex flex-col gap-2">
                <flux:input wire:model="name" label="NOMBRE DE PRODUCTO" />
                <flux:input wire:model="description" label="DESCRIPCION DE PRODUCTO" />

                <flux:select wire:model='category_id'>
                    
                        @foreach($categories as $category)
                        <flux:select.option value="{{$category->id}}">
                            {{$category->name}}
                        </flux:select.option>
                        @endforeach
                    x
                </flux:select>

                <flux:input type="file" wire:model="img" label="Actualizar Imagen" />

                <flux:radio.group wire:model="status" label="Estado del producto">
                    <flux:radio value="1" label="Activo" />
                    <flux:radio value="0" label="Inactivo" />
                </flux:radio.group>
            </div>

            <flux:button class="w-full mt-3" variant='primary' color="amber" wire:click='updateProduct()'> Guardar cambios </flux:button>
        </div>
        <div class="hidden md:block w-32">
            @if($product->img)
                <img src="/product-image/{{ $product->img }}" />
            @else 
                <div class="w-32 h-32 border flex justify-center items-center text-center ">
                    Sin imagen
                </div>
            @endif
        </div>
        
    </div>


    <flux:separator class="my-2" />
    <h2 class='text-xl '>Unidades de medida</h2>

    <livewire:products.relate-uom :product="$product" />

    <div class="md:hidden">
        <img src="/product-image/{{ $product->img }}" />
    </div>


</div>
