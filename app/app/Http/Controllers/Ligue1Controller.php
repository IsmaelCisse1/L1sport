<?php

namespace App\Http\Controllers;

use App\Repository\Ligue1Repository;


class Ligue1Controller extends Controller
{


    public function Ligue1(Ligue1Repository $ligue1Repository)
    {
        $article = $ligue1Repository->getArticleById(4); // Récupérer l'article avec l'ID 4

        return view('Ligue1', [
            'article' => $article
        ]);
    }
}
