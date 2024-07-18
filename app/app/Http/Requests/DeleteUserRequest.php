<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DeleteUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ou votre logique d'autorisation spécifique
    }

    public function rules()
    {
        return [
            // Ajoutez ici des règles de validation si nécessaire
        ];
    }
}
