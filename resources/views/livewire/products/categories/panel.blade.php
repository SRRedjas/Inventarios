<?php

use Livewire\Volt\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;


    public $name;

    public function confirmDeletion($id){

        LivewireAlert::title(__('Confirm deletion?'))
                    ->withConfirmButton(__('Yes, delete'))
                    ->warning()
                    ->onConfirm('deleteCategory', ['id' => $id])
                    ->withCancelButton(__('No, cancel'))
                    ->show();

    }

    public function deleteCategory($id){
        
        $category = Category::find($id['id']);

        
        if(!$category->products()->exists())
        {
            $category->delete();
            LivewireAlert::success()
                            ->title('Eliminacion realizada con éxito')
                            ->show();
        }
        else{
            LivewireAlert::error()
                            ->title('No se puede eliminar, tiene productos enlazados')
                            ->show();

        }
        

    }
    

    #[On('category-created')]
    public function with()
    {

        return [
            
            'categories' => Category::when($this->name, function($query){
            return $query->where('name', 'like', '%'.$this->name.'%');
            })->paginate(10)
        
        
        ];
    }
}; ?>

<div>
    <livewire:products.categories.create-form />

    <div>
    <flux:separator class="mt-4" />
        <div>
            <div class="my-4 p-2">
                <h3 class='text-md font-bold text-center'>{{__('Filters')}}</h3>
                <div class="flex mx-auto  justify-center flex-col md:flex-row md:justify-around gap-2">
                    <flux:input label='{{__("Name filter")}}' wire:model.live.debounce.500ms='name' />
                </div>
            </div>
            <table class="overflow-x-scroll mx-auto sm:p-4 border md:w-full w-3/4 ">
                <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
                    <tr>
                        <th class="p-2 text-white">{{__('Name')}}</th>
                        <th class="p-2 text-white">{{__('Description')}}</th>
                        <th class="p-2 text-white">{{__('Actions')}}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">
                        <td class="p-2 text-center">{{$category->name}}</td>
                        <td class="p-2 text-center">{{$category->description}}</td>
                        <td class="p-2 text-center">
                            <flux:button wire:click='confirmDeletion({{$category->id}})' class="hover:cursor-pointer" icon='trash' color='red' variant='primary'> </flux:button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>