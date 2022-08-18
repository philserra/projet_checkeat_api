<?php

namespace App\Http\Controllers;

use App\Models\Ordered;
use Illuminate\Http\Request;

class OrderedController extends Controller
{
    public function index()
    {

        $ordered = Ordered::all();
        return response()->json(['ordered' => $ordered]);
    }

    public function store(Request $request)
    {

        $ordered = Ordered::create([
            "name" => $request->name,
            "price" => $request->price,
            "total" => $request->total,
            "id_restaurant" => $request->id_restaurant,



        ]);

        return response()->json(["message" => 'Commande envoyé', "ordered" => $ordered]);
    }
}
