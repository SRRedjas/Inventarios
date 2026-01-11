<?php

use Livewire\Volt\Component;
use App\Models\Store;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    public $name;
    public $code;
    public $address;


    public function createStore(){

        $validated = $this->validate([
            'code'=>['required','string', Rule::unique('stores')],
            'name'=>['required' , 'string', Rule::unique('stores')],
            'address'=>'required|string',
        ]); 

        $validated['status'] = 1;
        

        Store::create($validated);

        LivewireAlert::title('Tienda creada')
                        ->success()
                        ->show();   

    }
    
}; ?>

<div>
    <div class="md:w-1/2 mx-auto flex gap-2 flex-col">
        <h3 class='font-bold text-center'>{{__('Store')}}</h3>
        <flux:field>
            <flux:label>{{__('Code')}}</flux:label>
            <flux:error name='code'></flux:error>
            <flux:input placeholder='ALM-001' wire:model="code" />
        </flux:field>
        <flux:field>
            <flux:label>{{__('Name')}}</flux:label>
            <flux:error name='name'></flux:error>
            <flux:input placeholder='Zona 1' wire:model="name" />
        </flux:field>
        <flux:field>
            <flux:label> {{__('Address')}}</flux:label>
            <flux:error name='address'></flux:error>
            <flux:input placeholder='' wire:model="address" />
        </flux:field>
        <flux:button wire:click='createStore'>
            {{__('Create')}}
        </flux:button>
    </div>


</div>
