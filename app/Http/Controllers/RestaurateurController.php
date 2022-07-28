<?php

namespace App\Http\Controllers;

use App\Models\Restaurateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RestaurateurController extends Controller
{

    // METHODE CRUD //

    // Création d'une fonction pour créer un profil restaurateur

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

        return response()->json(["message" => true, 'restaurateur' => $restaurateur]);
    }

    // Création d'une fonction pour afficher un profil restaurateur

    public function profile()
    {
        $restaurateur = Auth::user();
        return response()->json(["message" => "Profil crée", 'restaurateur' => $restaurateur]);
    }

    // Création d'une fonction pour modifier un profil restaurateur

    public function update(Request $request)
    {
        $restaurateur = Auth::user();

        $restaurateur->lastname = $request->lastname;
        $restaurateur->firstname = $request->firstname;
        $restaurateur->siret = $request->siret;
        $restaurateur->email = $request->email;
        $restaurateur->phone = $request->phone;
        $restaurateur->password = Hash::make($request->password);

        $restaurateur->save();

        return response()->json(["message" => "Modifier le profil", 'restaurateur' => $restaurateur]);
    }

    // Création d'une fonction pour supprimer un profil restaurateur

    public function destroy()
    {
        $restaurateur = Auth::user();

        $restaurateur->delete();

        return response()->json(["message" => true, 'restaurateur' => $restaurateur]);
    }

    // ******************************************************* //

    // FIN METHODE CRUD //

    // ******************************************************* //

    // Création d'une fonction pour se connecter

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

    // Création d'une fonction pour se déconnecter

    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
