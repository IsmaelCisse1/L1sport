<?php

namespace App\Routing;

use App\Http\Controllers\Faq_controller;

use App\Http\Controllers\L1promo_controller;
use App\Http\Controllers\Login_controller;
use App\Http\Controllers\ProfilUser_controller;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Offre_controller;
use App\Http\Controllers\Ligue1Controller;

use App\Http\Controllers\StoreUserController;

use App\Http\Controllers\Formulaire_controller;
use App\Http\Requests\Formulaire_request;
use App\Http\Controllers\L1homeController;

/*Accueil L1sport*/

Route::get('/L1sporthome', [L1homeController::class, 'L1sporthome'])->name('L1sporthome');


/* Inscription formulaire*/
Route::get('/Sub', [StoreUserController::class, 'index'])->name('Sub');
Route::post('/Sub', [StoreUserController::class, 'store'])->name('Login');

/* Connexion user*/
Route::get('/ProfilUser', [StoreUserController::class, 'show'])->name('ProfilUser');
Route::post('/ProfilUser', [StoreUserController::class, 'login'])->name('ProfilUser.submit');
Route::get('/Login/{id}', [StoreUserController::class, 'welcome'])->name('Login');

/*Modif user*/
Route::post('/Login/{id}', [StoreUserController::class, 'updatePrenom'])->name('Login');

/*Supprimez user*/
Route::delete('/Login/{id}', [StoreUserController::class, 'deleteUser'])->name('Login');

/*Deconnexion user*/
Route::post('/Login/{id}', [StoreUserController::class, 'logout'])->name('ProfilUser.logout');

/*Page ligue1*/
Route::get('/Ligue1', [Ligue1Controller::class, 'Ligue1'])->name('Ligue1');
