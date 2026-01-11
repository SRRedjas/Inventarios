<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovementSequence extends Model
{
     protected $fillable = ['movement_type_id','store_id','year','current_number'];
}
