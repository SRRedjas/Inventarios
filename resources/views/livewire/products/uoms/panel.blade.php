<?php

use Livewire\Volt\Component;
use App\Models\Uom;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {

    #[On('uom-created')]
    public function with(){

        return ['uoms'=> Uom::paginate(10)];
    }
}; ?>

<div>

    <livewire:products.uoms.create-form />
    

    <flux:separator class="mt-4" />


    <div>
        @foreach($uoms as $uom)
            <flux:button icon='funnel'>{{$uom->name}}</flux:button>
            
        @endforeach
    </div>




</div>
