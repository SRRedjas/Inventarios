<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
new class extends Component {
    public $name;
    public $description;
    


    public function createCategory(){

        $validado = $this->validate([
            'name'=> ['required','min:5','string', Rule::unique('categories')],
            'description'=> 'required|string',
            

        ]);

        Category::create($validado);
        LivewireAlert::title('Creado')->text('Categoria creada con exito')->success()->show();

        $this->reset();
        $this->dispatch('category-created');




    }
}; ?>

<div>
    <div class="md:w-1/2 mx-auto flex gap-2 flex-col">
        <h3 class='font-bold text-center'>Categorias</h3>
        <flux:field>
            <flux:label>Nombre</flux:label>
            <flux:error name='name'></flux:error>
            <flux:input placeholder='Equipo' wire:model="name" />
        </flux:field>
        <flux:field>
            <flux:error name='description'></flux:error>
            <flux:label>Descripcion</flux:label>
            <flux:input wire:model="description" placeholder='Equipo a la venta' />
        </flux:field>
        
        <flux:button wire:click='createCategory'>
            Crear
        </flux:button>
    </div>


</div>
