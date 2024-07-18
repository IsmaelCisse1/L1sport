<?

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ou votre logique d'autorisation spécifique
    }

    public function rules()
    {
        return [
            'prenom' => 'required|string|max:255', // Règles de validation pour le prénom
        ];
    }
}
