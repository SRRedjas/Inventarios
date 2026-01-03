<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {

    use WithPagination;
    

    #[On('product-created')]
    public function with()
    {
        return ['products' => Product::paginate(25)];
    }
}; ?>

<div>
    <flux:button href="{{route('products.uoms.panel')}}" icon='cube-transparent'>Unidades de medida</flux:button>
    <flux:button href="{{route('products.categories.panel')}}" icon='tag'>Categorias</flux:button>
    <livewire:products.create-form />
    <flux:separator class="my-2" />

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