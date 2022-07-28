<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsTrue;

class RestaurantController extends Controller
{

    // METHODE CRUD //

    // Création d'une fonction pour créer un/des restaurant(s)

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'adress' => 'required|string',
            'zip' => 'required|numeric',
            'city' => 'required|string',
            'tel' => 'required|numeric',
            'email' => 'required|email',
            'timetable' => 'required|numeric',
            'capacity' => 'required|numeric',
        ]);

        $id_restaurateur = Auth::id();

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'zip' => $request->zip,
            'city' => $request->city,
            'tel' => $request->tel,
            'email' => $request->email,
            'timetable' => $request->timetable,
            'capacity' => $request->capacity,
            'id_restaurateur' => $id_restaurateur,
        ]);

        return response()->json(['message' => true, 'restaurant' => $restaurant]);
    }

    // Création d'une fonction pour afficher un/des restaurant(s)

    public function profile()
    {
        $user = Auth::user();
        $restaurants = $user->restaurants;
        return response()->json(["message" => "Resto crée", 'restaurants' => $restaurants]);
    }

    // Création d'une fonction pour modifier un/des restaurant(s)

    public function update(Request $request, $id)
    {
        $user_id = Auth::id();

        $restaurant = Restaurant::where([
            ["id", $id],
            ["id_restaurateur", $user_id]
        ])->firstOrFail();

        $restaurant->name = $request->name;
        $restaurant->adress = $request->adress;
        $restaurant->zip = $request->zip;
        $restaurant->city = $request->city;
        $restaurant->tel = $request->tel;
        $restaurant->email = $request->email;
        $restaurant->timetable = $request->timetable;
        $restaurant->capacity = $request->capacity;
        $restaurant->id_restaurateur = $request->id_restaurateur;

        $restaurant->save();

        return response()->json(["message" => "Resto modifié"]);
    }

    // Création d'une fonction pour supprimer un/des restaurant(s)


    public function destroy($id)
    {
        $user_id = Auth::id();

        Restaurant::where([
            ["id", $id],
            ["id_restaurateur", $user_id]
        ])->delete();

        return response()->json(["message" => true]);
    }

    // FIN METHODE CRUD //
}
