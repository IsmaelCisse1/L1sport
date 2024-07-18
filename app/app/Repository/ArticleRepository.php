<?php

namespace App\Repository;

use PDO;
use Illuminate\Support\Facades\DB;
use PDOException;


class ArticleRepository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DB::connection()->getPdo();;
    }
    public function getAllArticles()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM articles");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des articles : " . $e->getMessage());
            return []; // Retourne un tableau vide en cas d'erreur
        }
    }
}
