<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formregister() {
        return view ('register');
    }

    public function processregister(Request $request){

        $firstName = $request->input('first-name');
        $lastName = $request->input('last-name');

        return view('welcome', ['firstName' => $firstName, 'lastName' => $lastName]);
    }
}
