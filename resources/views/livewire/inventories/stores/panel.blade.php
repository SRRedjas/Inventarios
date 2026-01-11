<?php

use Livewire\Volt\Component;
use App\Models\Store;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;


    public $name;


    public function with(){
        return ['stores'=> Store::when($this->name, function($query){
            return $query->where('name','like','%'.$this->name.'%');
        })->paginate(10)];
    }
}; ?>

<div>
    <livewire:inventories.stores.create-form />
    <flux:separator class="my-4" />

    <div class='flex flex-col md:flex-row justify-between py-4 gap-2'>
        <flux:input label='{{__("Name filter")}}' wire:model.live.debounce.500ms='name' />
    </div>

    <table class="overflow-x-scroll mx-auto sm:p-4 border md:w-full w-3/4 ">
        <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
            <tr>
                <th class="p-2 text-white">{{__('ID')}}</th>
                <th class="p-2 text-white">{{__('Codigo')}}</th>
                <th class="p-2 text-white">{{__('Name')}}</th>
                <th class="p-2 text-white">{{__('Address')}}</th>
                <th class="p-2 text-white">{{__('Status')}}</th>
                <th class="p-2 text-white">{{__('Actions')}}</th>
        
            
            </tr>
        </thead>
        <tbody>

            @foreach($stores as $store)
            <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">
                <td class="p-2 text-center">{{$store->id}}</td>
                <td class="p-2 text-center">{{$store->code}}</td>
                <td class="p-2 text-center">{{$store->name}}</td>
                <td class="p-2 text-center">{{$store->address}}</td>
                <td class="p-2 text-center">
                    @if($store->status)
                    Activo
                    @else
                    Inactivo
                    @endif

                </td>
                <td class="p-2 text-center">
                    <flux:button icon="magnifying-glass" :href="route('stores.store', ['store'=>$store->id])"/>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    {{$stores->links()}}
</div>