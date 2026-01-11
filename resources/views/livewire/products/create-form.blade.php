<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Uom;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    use WithFileUploads;

    public $code;
    public $codebar;
    public $name;
    public $description;
    public $image;
    public $category_id;


    public function createProduct(){
        $validated = $this->validate(
            [
                'code'=>['required','string',Rule::unique('products')],
                'codebar'=>['nullable','string',Rule::unique('products')],
                'name'=>'required|string',
                'description'=>'required|string',
                'image'=>'nullable|image',
                'category_id'=>'required|integer'
            ]
        );

        if($this->image){  
            $validated['img'] = $this->image->store(path: 'products');
        }
        
        $validated['status'] =1;


        Product::create($validated);

        LivewireAlert::title('Producto creado')
                        ->text('Recuerde añadir unidades de medida y detalles')
                        ->success()
                        ->show();

        $this->dispatch('product-created');
    }

    
    public function with(){
        return ['categories'=> Category::all(), 'uoms'=>Uom::all()];
    }    

}; ?>

<div>
    <div class="md:w-1/2 mx-auto flex gap-2 flex-col">
        <h3 class='font-bold text-center'>{{__('Product')}}</h3>
        
        <flux:field>
            <flux:label>{{__('Code')}}</flux:label>
            <flux:error name='code'></flux:error>
            <flux:input placeholder='ECS1211-1' wire:model="code" />
        </flux:field>
        <flux:field>
            <flux:label> {{__('Bar code')}}</flux:label>
            <flux:error name='codebar'></flux:error>
            <flux:input placeholder='1232141' wire:model="codebar" />
        </flux:field>
        <flux:field>
            <flux:label>{{__('Name')}}</flux:label>
            <flux:error name='name'></flux:error>
            <flux:input placeholder='Equipo' wire:model="name" />
        </flux:field>
        <flux:field>
            <flux:error name='description'></flux:error>
            <flux:label>{{__('Description')}}</flux:label>
            <flux:input wire:model="description" placeholder='Equipo a la venta' />
        </flux:field>
        <flux:field>
            <flux:error name='image'></flux:error>
            <flux:label>{{__('Image')}}</flux:label>
            <flux:input type='file' wire:model="image"  />
        </flux:field>
        <flux:field>
            <flux:error name='category_id'></flux:error>
            <flux:label>{{__('Category')}}</flux:label>
            <flux:select wire:model="category_id" >
                    <flux:select.option >Seleccione categoria</flux:select.option>
                @foreach($categories as $category)
                    <flux:select.option value="{{$category->id}}">{{$category->name}}</flux:select.option>
                @endforeach
            </flux:select>
        </flux:field>
        <flux:button wire:click='createProduct'>
            {{__('Create')}}
        </flux:button>
    </div>


</div>
