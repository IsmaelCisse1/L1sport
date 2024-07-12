<?php

namespace App\Http\Controllers;

class Offre_controller extends Controller
{
    public function index()
    {
        $msg = "Decouvrez l'offre L1sport";
        return view('Offre', compact('msg'));
    }
}
