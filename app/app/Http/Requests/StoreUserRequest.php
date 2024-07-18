<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool /*authorisation*/
    {
        return true;
    }

    public function rules(): array /*regle de validation du formulaire*/
    {
        return [
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|unique:utilisateurs,email|max:50',
            'mdp' => 'required|string|min:10|max:100',
            'adresse' => 'required|string|max:255',
            'payclick_user' => 'required|string|max:50'
        ];
    }



    public function errorMsg()
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'nom.max' => 'Le champ nom ne doit pas dépasser 50 caractères.',

            'prenom.required' => 'Le champ prénom est obligatoire.',
            'prenom.string' => 'Le champ prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le champ prénom ne doit pas dépasser 50 caractères.',

            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'email.max' => 'Le champ email ne doit pas dépasser 50 caractères.',

            'mdp.required' => 'Le champ mot de passe est obligatoire.',
            'mdp.string' => 'Le champ mot de passe doit être une chaîne de caractères.',
            'mdp.min' => 'Le mot de passe doit contenir au moins 10 caractères.',
            'mdp.max' => 'Le mot de passe ne doit pas dépasser 100 caractères.',

            'adresse.required' => 'Le champ adresse est obligatoire.',
            'adresse.string' => 'Le champ adresse doit être une chaîne de caractères.',
            'adresse.max' => 'Le champ adresse ne doit pas dépasser 255 caractères.',

            'payclick_user.required' => 'Le champ utilisateur PayClick est obligatoire.',
            'payclick_user.string' => 'Le champ utilisateur PayClick doit être une chaîne de caractères.',
            'payclick_user.max' => 'Le champ utilisateur PayClick ne doit pas dépasser 50 caractères.',
        ];
    }
}
