<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class StoreUserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('Sub');
    }

    public function store(StoreUserRequest $request)
    { {
            $validatedData = $request->validated();

            $result = $this->userRepository->createUser(
                $validatedData['nom'],
                $validatedData['prenom'],
                $validatedData['email'],
                $validatedData['adresse'],
                $validatedData['mdp'],
                $validatedData['payclick_user']
            );

            if ($result) {
                return redirect()->route('ProfilUser')->with('success', 'Utilisateur créé avec succès !');
            } else {
                return redirect()->back()->with('error', 'Erreur lors de la création de l\'utilisateur.');
            }
        }
    }

    public function show()
    {
        return view('ProfilUser');
    }

    public function login(LoginRequest $request, UserRepository $userRepository)
    {
        $validatedData = $request->validated();
        $user = $userRepository->LoginUser($validatedData['email'], $validatedData['mdp']);

        if ($user) {
            Auth::loginUsingId($user['id']);
            session(['user_name' => $user['nom'], 'user_prenom' => $user['prenom']]);

            return redirect()->route('Login', ['id' => $user['id']])->with('success', 'Vous êtes connecté !');
        } else {
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
            ])->withInput();
        }
    }

    public function welcome()
    {
        return view('Login');
    }

    public function updatePrenom(UpdateUserRequest $request, UserRepository $userRepository)
    {
        $userId = Auth::id(); // Récupérez l'ID de l'utilisateur connecté
        $newPrenom = $request->input('prenom');

        if ($userRepository->updateUser($userId, $newPrenom)) {
            return back()->with('success', 'Prénom mis à jour avec succès !');
        } else {
            return back()->withErrors(['prenom' => 'Erreur lors de la mise à jour du prénom.']);
        }
    }

    public function deleteUser(DeleteUserRequest $request, UserRepository $userRepository) // Ou simplement Request $request si pas de Form Request
    {
        $userId = Auth::id(); // Récupérez l'ID de l'utilisateur connecté


        if ($userRepository->deleteUser($userId)) {
            Auth::logout(); // Déconnectez l'utilisateur après la suppression
            return redirect('/L1sporthome')->with('success', 'Votre compte a été supprimé.'); // Redirigez vers la page d'accueil
        } else {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression de votre compte.']);
        }
    }




    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecte l'utilisateur

        // Supprimez le cookie "remember_web" s'il existe
        if ($request->hasCookie('remember_web')) {
            Cookie::queue(Cookie::forget('remember_web'));
        }

        // Invalidez la session et régénérez le jeton CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/ProfilUser')->with('success', 'Vous avez été déconnecté.');
    }
}
