<?php

namespace App\Http\Controllers;



class L1home_controller extends Controller
{

    public function index()
    {
        $données = [
            'titre' => 'L1SPORT',
            'article' => 'L1SPORT la chaine de foot pour les passionnées !'
        ];
        return view('L1sporthome', $données);
    }
}
