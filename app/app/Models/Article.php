<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';

    protected $fillable = [
        'titreArticle',
        'contenuArticle',
        'photoArticle',
        'videoArticle',
    ];
}
