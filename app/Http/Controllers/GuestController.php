<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index()
    {
        $restaurant = Restaurant::all();
        return response()->json(["restaurant" => $restaurant]);
    }
}
