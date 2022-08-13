<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function index($id)
    {
        // $liste = Menu::all();
        $liste = DB::table('menus')->where('id_restaurant', $id)->get();
        return response()->json(["liste" => $liste]);
    }

    public function findRestaurant($id)
    {

        // $user = Auth::id();

        // $findUser = DB::table('restaurants')->where('id_restaurateur', $user)->get('id');

        $findUser = Restaurant::findOrFail($id);
        return response()->json(['info' => $findUser]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {


        $menu = Menu::create([
            "name" => $request->name,
            "category" => $request->category,
            "priceHt" => $request->priceHt,
            "tva" => $request->tva,
            'priceTtc' => round($request->priceHt * ($request->tva + 100) / 100, 2,  PHP_ROUND_HALF_UP), // Calcul du prix TTC avec arrondi à 2 décimales
            'id_restaurant' => $request->id_restaurant


        ]);

        return response()->json(["message" == true, "menu" => $menu]);
    }



    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json([
            "menu" => $menu
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

        // $id_restaurant = Auth::id();

        $menu = Menu::findorfail($id);

        $menu->delete();

        return response()->json(["message" => true, 'menu' => $menu]);
    }
}
