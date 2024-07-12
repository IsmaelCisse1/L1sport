<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ArticleRepository
{

    public function getAll()
    {
        $pdo = DB::connection()->getPdo();


        // $sql = "
        //     SELECT articles.*
        //     FROM L1sport.articles
        //     WHERE articles.article_id = :article_id;
        // ";

        // $query = $pdo->prepare($sql);
        // $query->execute([
        //     "article_id" => 1,
        // ]);

        $sql = "
            SELECT articles.*
            FROM L1sport.articles;
        ";

        $query = $pdo->prepare($sql);
        $query->execute();

        $results = $query->fetchAll();

        return $results;
    }
}
