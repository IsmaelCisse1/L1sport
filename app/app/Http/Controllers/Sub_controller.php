<?php

namespace App\Http\Controllers;

class Sub_controller extends Controller
{
    public function index()
    {
        $msg = "Abonnez vous en remplissant le formulaire";
        return view('Sub', compact('msg'));
    }
}
