<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:50',
            'mdp' => 'required|string|min:10|max:100'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Le champ e-mail est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse e-mail valide.',
            'mdp.required' => 'Le champ mot de passe est obligatoire.',
            'mdp.min' => 'Le mot de passe doit contenir au moins 10 caractères.',
        ];
    }
}
