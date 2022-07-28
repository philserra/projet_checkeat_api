<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json(["restaurants" => $restaurants]);
    }
}
