<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class utilisateurRepository
{
    public function getAll()
    {
        $pdo = DB::connection()->getPdo();

        $sql = "SELECT * FROM utilisateurs";

        $query = $pdo->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }
}
