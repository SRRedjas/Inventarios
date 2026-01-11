<?php

use Livewire\Volt\Component;
use App\Models\MovementType;


new class extends Component {
    

    public function with(){

        return ['types'=> MovementType::all()];
    }
}; ?>

<div>
    <livewire:inventories.movement-types.create-form />
    <flux:separator class="my-4" />

    <div class='flex flex-col md:flex-row justify-between py-4 gap-2'>
        <flux:input label='{{__("Code filter")}}' wire:model.live.debounce.500ms='code' />
    </div>

    <table class="overflow-x-scroll mx-auto sm:p-4 border md:w-full w-3/4 ">
        <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
            <tr>
                
                <th class="p-2 text-white">{{__('Code')}}</th>
                <th class="p-2 text-white">{{__('Description')}}</th>
                
                
        
            
            </tr>
        </thead>
        <tbody>

            @foreach($types as $type)
            <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">
                
                <td class="p-2 text-center">{{$type->code}}</td>
                <td class="p-2 text-center">{{$type->description}}</td>
                
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
 