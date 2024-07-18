<?php

namespace App\Repository;

use PDO;
use Illuminate\Support\Facades\DB;
use PDOException;


class Ligue1Repository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DB::connection()->getPdo();;
    }

    public function getArticleById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE article_id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération de l'article : " . $e->getMessage());
            return null;
        }
    }
}
