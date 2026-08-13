<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);
    }

    public function login(Request $request) {}

    public function me(Request $request) {}

    public function logout(Request $request) {}
    //
}
