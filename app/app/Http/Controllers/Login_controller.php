<?php

namespace App\Http\Controllers;

class Login_controller extends Controller
{
    public function index()
    {
        $msg = "Page Connexion";
        return view('Login', compact('msg'));
    }
}
