<?php

namespace App\Http\Controllers;

use Illuminate\Http\RequestResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PostController extends Controller
{

    //Montre la vue du formulaire a remplir//
    public function create(): Vue
    {
        return view('post.create');
    }

    //Valide les données saisit par l'user//
    public function store(Request $request): RedirectResponse
{   

    $validated = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'mdp' => 'required',
        'adresse' => 'required',
        'payclick_user' => 'required'
    ]);
    $post = ;

    return to_route('post.show', ['post' => $post->id]);
}

}