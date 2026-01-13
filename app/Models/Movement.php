<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movement extends Model
{
    protected $fillable = [
        'correlative', 'status', 'comments', 'user_id', 'store_id', 'movement_type_id', 'movement_date'
    ];


    public function created_by(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }


    public function store():BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function movement_type(): BelongsTo
    {
        return $this->belongsTo(MovementType::class);
    }

    public function details():HasMany
    {
        return $this->hasMany(MovementDetail::class,'movement_id');
    }


}
