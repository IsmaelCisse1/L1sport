<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repository\ArticleRepository;

class Article_controller extends Controller
{
    public function __construct(private ArticleRepository $articleRepository)
    {
    }
    public function index()
    {
        $articles = Article::all();
        return view('L1sporthome', compact('articles'));
    }
}
