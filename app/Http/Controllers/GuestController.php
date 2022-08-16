<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json(["restaurants" => $restaurants]);
    }

    public function showmenu($id)
    {
        $menu = DB::table('menus')->where('id_restaurant', $id)->get();
        return response()->json(["menu" => $menu]);
    }
}
