<?php

namespace App\Http\Controllers;

use App\Http\Requests\Formulaire_request;

class Formulaire_controller extends Controller
{
    public function store(Formulaire_request $request)
    {
        $valide = $request->validated();
    }
}
