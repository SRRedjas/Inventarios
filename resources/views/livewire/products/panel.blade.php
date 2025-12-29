<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {
    
}; ?>

<div>
    <flux:button href="{{route('products.uoms.panel')}}" icon='cube-transparent'>Unidades de medida</flux:button>
    <flux:button href="{{route('products.categories.panel')}}" icon='tag'>Categorias</flux:button>


    <livewire:products.create-form />
</div>
