<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illumiante\Database\Eloquent\BelongTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'code',
        'codebar',
        'name',
        'img',
        'description',
        'category_id',
        'status'
    ];


    public function uoms(): BelongsToMany
    {
        return $this->belongsToMany(Uom::class, 'uom_product');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
}
