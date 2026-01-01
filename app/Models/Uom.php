<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Uom extends Model
{
    protected $fillable = [
        'name', 
        'sym',
        'factor',
        'type'
    ];


    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, $table='uom_product');
    }
    
}