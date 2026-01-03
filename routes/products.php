<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Volt\Volt;




Volt::route('/products', 'products.panel')->name('products.panel');
Volt::route('/uoms', 'products.uoms.panel')->name('products.uoms.panel');
Volt::route('/categories', 'products.categories.panel')->name('products.categories.panel');
Volt::route('/product/{product}', 'products.product')->name('product-view');


Route::get('/product-image/{directory}/{filename}', function ($directory,$filename){
    $path = storage_path('app/private/' . $directory . '/' . $filename);

    if(!Storage::disk('local')->exists($directory.'/'.$filename)){
        abort(404);
    }

    return Response::file($path);
})->name('product.image');