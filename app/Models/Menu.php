<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    // public function contact()
    // {
    //     return $this->belongsTo(Restaurant::class, 'id_restaurant', 'id');
    // }
}
