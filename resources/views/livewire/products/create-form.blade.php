<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Uom;

new class extends Component {
    

    
    public function with(){
        return ['categories'=> Category::all(), 'uoms'=>Uom::all()];
    }    

}; ?>

<div >
    

</div>
