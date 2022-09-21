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
            "id_command" => $request->id_command,
            "status" => $request->status,



        ]);

        return response()->json(["message" => 'Commande envoyé', "ordered" => $ordered]);
    }

    public function update(Request $request, $id)
    {
        $ordered = Ordered::where([
            ["id", $id]
        ])->firstOrFail();


        $ordered->status = $request->status;


        $ordered->save();

        return response()->json(['oredered' => $ordered]);
    }

    public function orderedpayment($id_command)
    {
        $orderedPayment = Ordered::where([
            ["id_command", $id_command]
        ])->get();







        return response()->json(['orderedpayment' => $orderedPayment]);
    }
}
