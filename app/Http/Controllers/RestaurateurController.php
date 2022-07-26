<?php

namespace App\Http\Controllers;

use App\Models\Restaurateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password' =>  Hash::make($request->password),
        ]);

        $token = $restaurateur->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

        // return response()->json(["message" => true, 'restaurateur' => $restaurateur]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurateur = Restaurateur::findorfail($id);
        return response()->json(["message" => "Profil crée", 'restaurateur' => $restaurateur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurateur = Restaurateur::findorfail($id);
        return response()->json(['restaurateur' => $restaurateur]);
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
        $restaurateur = Restaurateur::findorfail($id);

        $restaurateur->lastname = $request->lastname;
        $restaurateur->firstname = $request->firstname;
        $restaurateur->siret = $request->siret;
        $restaurateur->email = $request->email;
        $restaurateur->phone = $request->phone;
        $restaurateur->password = $request->password;

        $restaurateur->save();

        return response()->json(["message" => "Modifier le profil", 'restaurateur' => $restaurateur]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurateur = Restaurateur::findorfail($id);

        $restaurateur->delete();

        return response()->json(["message" => true, 'restaurateur' => $restaurateur]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $restaurateur = Restaurateur::where('email', $request['email'])->firstOrFail();

        $token = $restaurateur->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
}
