<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Livewire\Volt\Volt;




Volt::route('/stores', 'inventories.stores.panel')->name('stores.panel');
Volt::route('/stores/{store}', 'inventories.stores.store')->name('stores.store');
Volt::route('/movementTypes', 'inventories.movement-types.panel')->name('movement-types.panel');
Volt::route('/movements', 'inventories.movements.panel')->name('movements.panel');
Volt::route('/newMovement', 'inventories.movements.create-form')->name('movements.new');
Volt::route('/editMovement/{corr}', 'inventories.movements.edit')->name('movements.edit');
