<?php

namespace App\Http\Controllers;

use App\Models\Restaurateur;
use Illuminate\Http\Request;

class RestaurateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'siret' => 'required|numeric',
            'email' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $restaurateur = Restaurateur::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'siret' => $request->siret,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        return response()->json(["message" => "Profil crée", 'restaurateur' => $restaurateur]);
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
        //
    }
}
