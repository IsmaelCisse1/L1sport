<?php

namespace App\Http\Controllers;

use App\Repository\ArticleRepository;


class L1homeController extends Controller
{
    public function L1sporthome(ArticleRepository $articlesRepository)
    {
        $articles = $articlesRepository->getAllArticles();

        return view('L1sporthome', [
            'articles' => $articles
        ]);
    }
}
