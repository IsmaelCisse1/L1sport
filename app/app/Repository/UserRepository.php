<?php

namespace App\Repository;

use PDO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDOException;

class UserRepository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DB::connection()->getPdo();;
    }

    public function CreateUser($nom, $prenom, $email, $adresse, $mdp, $payclick_user)
    {
        try {
            $mdp_hash = bcrypt($mdp); /*Hash*/

            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, adresse, mdp, payclick_user) 
            VALUES (:nom, :prenom, :email, :adresse, :mdp, :payclick_user)"); /*req preparé*/

            $stmt->bindParam(':nom', $nom);  /*secu injection sql*/
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':mdp', $mdp_hash);
            $stmt->bindParam(':payclick_user', $payclick_user);

            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $error) {       /*Gestion d'erreurs*/
            error_log("Erreur creation de lutilisateurs" . $error->getMessage());
        }
    }

    public function LoginUser($email, $mdp)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT id, nom, prenom, email, mdp, adresse FROM utilisateurs WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($mdp, $user['mdp'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erreur lors de la connexion : " . $e->getMessage());
            return false;
        }
    }

    public function updateUser($userId, $newPrenom)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE utilisateurs SET prenom = :prenom WHERE id = :id");
            $stmt->bindParam(':prenom', $newPrenom, PDO::PARAM_STR);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return true; // Mise à jour réussie
        } catch (PDOException $e) {
            error_log("Erreur lors de la mise à jour du prénom : " . $e->getMessage());
            return false; // Mise à jour échouée
        }
    }

    public function deleteUser($userId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = :id");
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return true; // Suppression réussie
        } catch (PDOException $e) {
            error_log("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
            return false; // Suppression échouée
        }
    }



    public function logout()
    {
        Auth::logout(); // Déconnecte l'utilisateur

        return redirect('/L1sporthome')->with('success', 'Vous avez été déconnecté.');
    }
}
