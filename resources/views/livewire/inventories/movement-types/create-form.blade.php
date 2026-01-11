<?php

use Livewire\Volt\Component;
use App\Models\MovementType;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    
    public $code;
    public $description;


    public function createType(){

        $validated = $this->validate([
            'code'=>['required','string', Rule::unique('movement_types')],
            'description'=>'required|string',
        ]); 

        
        

        MovementType::create($validated);

        LivewireAlert::title('Tipo de movimiento creado')
                        ->success()
                        ->show();   

    }
    
}; ?>

<div>
    <div class="md:w-1/2 mx-auto flex gap-2 flex-col">
        <h3 class='font-bold text-center'>{{__('Movement Type')}}</h3>
        <flux:field>
            <flux:label>{{__('Code')}}</flux:label>
            <flux:error name='code'></flux:error>
            <flux:input placeholder='ENT' wire:model="code" />
        </flux:field>
        <flux:field>
            <flux:label>{{__('Description')}}</flux:label>
            <flux:error name='name'></flux:error>
            <flux:input placeholder='Entrada' wire:model="description" />
        </flux:field>
        
        <flux:button wire:click='createType'>
            {{__('Create')}}
        </flux:button>
    </div>


</div>
