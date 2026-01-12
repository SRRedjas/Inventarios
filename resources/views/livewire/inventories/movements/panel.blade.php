<?php

use Livewire\Volt\Component;
use App\Models\Movement;

new class extends Component {
    public function with(){
        return ['movements'=>Movement::all()];
    }
}; ?>

<div>
    
    <flux:separator class="my-4" />

    <div class='flex flex-col md:flex-row justify-between py-4 gap-2 items-center'>
        <flux:input label='{{__("Code filter")}}' wire:model.live.debounce.500ms='code' />
        <flux:button icon='document-plus' variant="primary" color="green" :href="route('movements.new')" />
    </div>

    <table class="overflow-x-scroll mx-auto sm:p-4 border md:w-full w-3/4 ">
        <thead class="bg-linear-to-t from-sky-400 to-indigo-400 ">
            <tr>


                <th class="p-2 text-white">{{__('Movement Type')}}</th>    
                <th class="p-2 text-white">{{__('Correlative')}}</th>
                <th class="p-2 text-white">{{__('Store')}}</th>
                <th class="p-2 text-white">{{__('Date')}}</th>
                
                
        
            
            </tr>
        </thead>
        <tbody>

            @foreach($movements as $movement)
            <tr class="hover:bg-zinc-200 dark:hover:bg-zinc-600">
                
                
                
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
 