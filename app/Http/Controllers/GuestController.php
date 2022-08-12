<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json(["restaurants" => $restaurants]);
    }

    public function showmenu()
    {
        $menu = Menu::all();
        return response()->json(["menu" => $menu]);
    }
}
