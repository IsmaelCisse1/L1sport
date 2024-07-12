<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Repository\UtilisateurRepository;

class ProfilUser_controller extends Controller
{

    public function __construct(private UtilisateurRepository $utilisateurRepository)
    {
    }

    public function show()
    {
        $utilisateurs = Utilisateur::all();

        return view('ProfilUser', compact('utilisateurs'));
    }
}
