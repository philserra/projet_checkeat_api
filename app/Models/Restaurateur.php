<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurateur extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function invoice()
    {
       
        return $this->hasOne(Restaurant::class, 'id_restaurant', 'id');
    }
}

