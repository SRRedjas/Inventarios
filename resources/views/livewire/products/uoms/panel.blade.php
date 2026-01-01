<?php

use Livewire\Volt\Component;
use App\Models\Uom;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


new class extends Component {

    use WithPagination;

    public $type;
    public $name;
    public $symbol;


    public function confirmDeletion($id){

        LivewireAlert::title(__('Confirm deletion?'))
                    ->withConfirmButton(__('Yes, delete'))
                    ->warning()
                    ->onConfirm('deleteUom', ['id' => $id])
                    ->withCancelButton(__('No, cancel'))
                    ->show();

    }


    public function deleteUom($id){
        
        $uom = Uom::find($id['id']);

        
        if(!$uom->products()->exists())
        {
            $uom->delete();
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
    


    #[On('uom-created')]
    public function with(){

        return [
            
            
            'uoms'=> Uom::when($this->type, function($query){
            return $query->where('type','like','%'.$this->type.'%');
        })->when($this->name, function($query){
            return $query->where('name', 'like', '%'.$this->name.'%');
        })
        ->when($this->symbol, function($query){
            return $query->where('sym', 'like', '%'.$this->symbol.'%');
        })
        ->paginate(10),
        'types'=>Uom::select('type')->distinct('type')->get(),
    ];
    }
}; ?>

<div>

    <livewire:products.uoms.create-form />
    

    <flux:separator class="mt-4" />


    <div>

        <div class="my-4 p-2">
            <h3 class='text-md font-bold text-center'>{{__('Filters')}}</h3>              
            <div class="flex mx-auto  justify-center flex-col md:flex-row md:justify-around gap-2">
                <flux:input label='{{__("Name filter")}}' wire:model.live.debounce.500ms='name' />
                <flux:select label='{{__("Type filter")}}' wire:model.live.debounce.500ms='type'>

                        <flux:select.option value=''>Filtrar por tipo</flux:select.option>
                    @foreach($types as $type)
                        <flux:select.option value='{{$type->type}}'>{{$type->type}}</flux:select.option>
                    @endforeach
                    
                </flux:select>
                <flux:input label='{{__("Symbol filter")}}' wire:model.live.debounce.500ms='symbol' />
            </div>
        </div>
        <table class="overflow-x-scroll mx-auto sm:p-4 border md:w-full w-3/4 ">
            <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
                <tr>
                    <th class="p-2 text-white">{{__('Name')}}</th>
                    <th class="p-2 text-white">{{__('Type')}}</th>
                    <th class="p-2 text-white">{{__('Symbol')}}</th>
                    <th class="p-2 text-white">{{__('Factor')}}</th>
                    <th class="p-2 text-white">{{__('Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($uoms as $uom)
                    <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">
                        <td class="p-2 text-center">{{$uom->name}}</td>
                        <td class="p-2 text-center">{{$uom->type}}</td>
                        <td class="p-2 text-center">{{$uom->sym}}</td> 
                        <td class="p-2 text-center">x{{$uom->factor}}</td> 
                        <td class="p-2 text-center">
                            <flux:button wire:click='confirmDeletion({{$uom->id}})' class="hover:cursor-pointer" icon='trash' color='red' variant='primary'> </flux:button>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>




</div>
