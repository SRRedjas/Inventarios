<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {

    use WithPagination;

    public $code;
    public $barcode;
    public $name;    
    public $description;  

    #[On('product-created')]
    public function with()
    {
        return ['products' => 
        Product::when($this->name, function($query){
            return $query->where('name','like','%'.$this->name.'%');
        })->when($this->code, function($query){
            return $query->where('code', 'like', '%'.$this->code.'%');
        })
        ->when($this->description, function($query){
            return $query->where('description', 'like', '%'.$this->description.'%');
        })
        ->paginate(10),
        ];
    }
}; ?>

<div>
    <flux:button href="{{route('products.uoms.panel')}}" icon='cube-transparent'>Unidades de medida</flux:button>
    <flux:button href="{{route('products.categories.panel')}}" icon='tag'>Categorias</flux:button>
    <livewire:products.create-form />
    <flux:separator class="my-4" />

    <div class='flex flex-col md:flex-row justify-between py-4 gap-2'>
        <flux:input label='{{__("Name filter")}}' wire:model.live.debounce.500ms='name' />
        <flux:input label='{{__("Code filter")}}' wire:model.live.debounce.500ms='code' />
        <flux:input label='{{__("Description filter")}}' wire:model.live.debounce.500ms='description' />
    </div>

    <table class="overflow-x-scroll mx-auto sm:p-4 border md:w-full w-3/4 ">
        <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
            <tr>
                <th class="p-2 text-white">{{__('Code')}}</th>
                <th class="p-2 text-white">{{__('Name')}}</th>
                <th class="p-2 text-white">{{__('Description')}}</th>
                <th class="p-2 text-white">{{__('Status')}}</th>
                <th class="p-2 text-white">{{__('Actions')}}</th>
            
            </tr>
        </thead>
        <tbody>

            @foreach($products as $product)
            <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">
                <td class="p-2 text-center">{{$product->code}}</td>
                <td class="p-2 text-center">{{$product->name}}</td>
                <td class="p-2 text-center">{{$product->description}}</td>
                <td class="p-2 text-center">{{$product->status}}</td>
                <td class="p-2 text-center">
                    <flux:button icon="magnifying-glass" href="{{route('product-view', ['product'=>$product->id])}}" />
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>