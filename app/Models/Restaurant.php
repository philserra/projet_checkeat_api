<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function contact()
    {

        return $this->belongsTo(Restaurateur::class, 'id_restaurant', 'id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_restaurant', 'id');
    }
}
