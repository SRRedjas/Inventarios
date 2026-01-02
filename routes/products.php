<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;




Volt::route('/products', 'products.panel')->name('products.panel');
Volt::route('/uoms', 'products.uoms.panel')->name('products.uoms.panel');
Volt::route('/categories', 'products.categories.panel')->name('products.categories.panel');
Volt::route('/product/{product}', 'products.product')->name('product-view');
