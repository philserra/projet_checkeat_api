<?php

namespace App\Http\Controllers;

use App\Models\Restaurateur;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // public function login(Request $request)
    // {
    //     $restaurateur = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];
    //     if (Auth::attempt($restaurateur)) {
    //         $success = true;
    //         $message = 'ok';
    //     } else {
    //         $success = false;
    //         $message = 'pas ok';
    //     }
    //     $response = [
    //         'success' => $success,
    //         'message' => $message
    //     ];
    //     return response()->json($response);
    // }
}
