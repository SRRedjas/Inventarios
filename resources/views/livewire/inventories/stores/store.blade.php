<?php

use Livewire\Volt\Component;
use App\Models\Store;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Validation\Rule;


new class extends Component {
    
    public Store $store;
    public $name;
    public $code;
    public $address;
    public $status;
    
    public function updateStore()
    {
        $validated = $this->validate(
            [
                
                'code'=>['required','string', Rule::unique('stores')],
                'name'=>['required','string', Rule::unique('stores')],
                'address'=>'required|string',
                'status'=>'required|boolean'
            ]
        );

        $this->store->update($validated);

        LivewireAlert::title('Informacion actualizada')
                        ->success()
                        ->show();
        

    }
    public function mount()
    {
        $this->name = $this->store->name;
        $this->code = $this->store->code;
        $this->address = $this->store->address;
        $this->status = $this->store->status;
        
    }

    
}; ?>

<div class="p-2  mx-auto dark:bg-zinc-900">
    <div class="block  md:flex justify-around items-center">
        <div class="md:p-4">
            <h2 class="font-bold text-center">{{ __('Store') }}</h2>
            <div class="grid grid-cols-2 gap-2 ">
                <flux:input type='text' readonly value="{{ $store->id }}" label="ID" />
            </div>


            <flux:separator class="my-2" />
            <div class="flex flex-col gap-2">                
                <flux:input wire:model="code" label="CODIGO DE BODEGA" readonly/>
                <flux:input wire:model="name" label="NOMBRE DE BODEGA" />
                <flux:input wire:model="address" label="DIRECCIÓN DE BODEGA" />

    
                

                <flux:radio.group wire:model="status" label="ESTADO DE BODEGA">
                    <flux:radio value="1" label="Activo" />
                    <flux:radio value="0" label="Inactivo" />
                </flux:radio.group>
            </div>

            <flux:button class="w-full mt-3" variant='primary' color="amber" wire:click='updateStore()'> Guardar cambios </flux:button>
        </div>
        
    </div>


    <flux:separator class="my-2" />
    


</div>
