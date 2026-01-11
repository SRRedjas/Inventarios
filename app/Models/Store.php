<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    protected $fillable = [
        'code',
        'name',
        'address',
        'status'
    ];


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'inventories');
    }    


    public function incomingTransfer(): BelongsToMany
    {
        return $this->belongsToMany(Transfer::class,foreignPivotKey:'to');
    }

    public function outgoingTransfer(): BelongsToMany
    {   
        return $this->belongsToMany(Transfer::class, foreignPivotKey:'from');
    }
}
