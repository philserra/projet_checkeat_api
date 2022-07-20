<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json(['restaurants' => $restaurants]);
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
        $request->validate([
            'name' => 'required|string',
            'adress' => 'required|string',
            'zip' => 'required|numeric',
            'city' => 'required|string',
            'email' => 'required|email',
            'timetable' => 'required|numeric',
            'capacity' => 'required|numeric',
            'id_restaurateur' => 'required|numeric'

        ]);

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'zip' => $request->zip,
            'city' => $request->city,
            'email' => $request->email,
            'timetable' => $request->timetable,
            'capacity' => $request->capacity,
            'id_restaurateur' => $request->id_restaurateur,
        ]);

        return response()->json(['message' => 'Restaurant ajouté','restaurant'=> $restaurant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        return response()->json([
            "restaurants" => $restaurants
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        return response()->json([
            "restaurants" => $restaurants
        ]);
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
        $restaurants = Restaurant::findOrFail($id);

        $restaurants->name = $request->name;
        $restaurants->adress = $request->adress;
        $restaurants->zip = $request->zip;
        $restaurants->city = $request->city;
        $restaurants->email = $request->email;
        $restaurants->timetable = $request->timetable;
        $restaurants->capacity = $request->capacity;
        $restaurants->id_restaurateur = $request->id_restaurateur;

        $restaurants->save();

        return response()->json(['restaurants' => $restaurants]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurants = Restaurant::findOrFail($id);

        $restaurants->delete();

        return response()->json(['restaurants' => $restaurants]);
    }
}
