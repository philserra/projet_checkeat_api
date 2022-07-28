<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    public function index()
    {
        $liste = Menu::all();
        return response()->json(["liste" => $liste]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $id_restaurant = Auth::id();

        $menu = Menu::create([
            "name" => $request->name,
            "category" => $request->category,
            "priceHt" => $request->priceHt,
            "tva" => $request->tva,
            'priceTtc' => round($request->priceHt * ($request->tva + 100) / 100, 2,  PHP_ROUND_HALF_UP), // Calcul du prix TTC avec arrondi à 2 décimales
            'id_restaurant' => $id_restaurant,


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

    public function destroy()
    {

        $id_restaurant = Auth::id();

        $menu = Menu::findorfail();

        $menu->delete($id_restaurant);

        return response()->json(["message" => true, 'menu' => $menu]);
    }
}
