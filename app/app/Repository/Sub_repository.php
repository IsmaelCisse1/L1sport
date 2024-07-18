<?php

namespace App\Repository;

use App\Models\Abonnement;
use  Illuminate\Support\Facades\Hash;
use PDO;

use function Laravel\Prompts\password;

class SubRepository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function CreateUser(array $data)
    {
        $mdphash = password_hash($data['mdp'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO abonnements (nom, prenom, email, mdp, adresse, payclick_user
                VALUES (:nom, :prenom, :email, :mdp, :adresse, :payclick_user)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':email' => $data['email'],
            ':mdp' => $data['mdp'],
            ':adresse' => $data['adresse'],
            'payclick_user' => $data['payclick_user'],
        ]);
        return $this->pdo->lastInsertId();
    }
}
