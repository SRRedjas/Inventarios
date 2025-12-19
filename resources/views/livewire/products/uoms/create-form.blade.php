<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rule;
use App\Models\Uom;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
new class extends Component {
    public $name;
    public $sym;
    public $factor;
    public $type;


    public function crearUom(){

        $validado = $this->validate([
            'name'=> ['required','min:5','string', Rule::unique('uoms')],
            'sym'=> 'required|string',
            'factor'=> 'required|integer',
            'type'=> 'required|string'

        ]);

        Uom::create($validado);
        LivewireAlert::title('Creado')->text('Unidad de medida creada con exito')->success()->show();

        $this->dispatch('uom-created');




    }
}; ?>

<div>
    <div class="md:w-1/2 mx-auto flex gap-2 flex-col">
        <h3 class='font-bold text-center'>Unidades de Medida</h3>
        <flux:field>
            <flux:label>Nombre</flux:label>
            <flux:error name='name'></flux:error>
            <flux:input placeholder='Unidad' wire:model="name" />
        </flux:field>
        <flux:field>
            <flux:error name='sym'></flux:error>
            <flux:label>Simbolo</flux:label>
            <flux:input wire:model="sym" placeholder='UNI' />
        </flux:field>
        <flux:field>
            <flux:error name='factor'></flux:error>
            <flux:label>Factor</flux:label>
            <flux:input wire:model="factor" type='number' placeholder='1' />
        </flux:field>
        <flux:field>
            <flux:error name='type'></flux:error>
            <flux:label>Tipo</flux:label>
            <flux:select wire:model='type'>
                <flux:select.option>Seleccione tipo de unidad de medida</flux:select.option>
                <flux:select.option>Estándar</flux:select.option>
                <flux:select.option>Volúmen</flux:select.option>
                <flux:select.option>Longitud</flux:select.option>
                <flux:select.option>Peso</flux:select.option>
            </flux:select>
        </flux:field>
        <flux:button wire:click='crearUom'>
            Crear
        </flux:button>
    </div>


</div>
