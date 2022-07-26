<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = Menu::all();
        return response()->json(["liste" => $liste]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Menu::create([
            "name" => $request->name,
            "category" => $request->category,
            "priceHt" => $request->priceHt,
            "tva" => $request->tva,
            'priceTtc' => round($request->priceHt * ($request->tva + 100) / 100, 2,  PHP_ROUND_HALF_UP), // Calcul du prix TTC avec arrondi à 2 décimales
            'id_restaurateur' => $request->id_restaurateur,


        ]);

        return response()->json(["message" == true, "name" => $name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id); // Récupération d'une facture par son id

        $menu->delete(); // Suppression de la facture

        // return view('invoices.deleted', ['invoice' => $invoice]); 
    }
}
