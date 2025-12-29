<?php

use Livewire\Volt\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;
    

    #[On('category-created')]
    public function with(){

        return ['categories' => Category::paginate(10)];
    }
}; ?>

<div>
    <livewire:products.categories.create-form />



    @foreach($categories as $category)
        <flux:button icon='tag'>{{$category->name}}</flux:button>
    @endforeach
    {{$categories->links()}}
</div>
