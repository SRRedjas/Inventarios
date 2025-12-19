<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illumiante\Database\Eloquent\BelongTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'img',
        'description',
        'category_id',
        'status',
        'oum_id'
    ];


    public function uom(): BelongsTo
    {
        return $this->belongsTo(Uom::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
}
