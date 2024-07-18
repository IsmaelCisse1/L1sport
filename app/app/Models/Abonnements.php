<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Abonnements extends Model
{
    protected $table = 'abonnements';

    protected $champs = [
        'nom',
        'prenom',
        'email',
        'mdp',
        'adresse',
        'payclick_user'

    ];
}
