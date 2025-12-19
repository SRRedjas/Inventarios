<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Uom extends Model
{
    protected $fillable = [
        'name', 
        'sym',
        'factor',
        'type'
    ];


    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
   }
    
}