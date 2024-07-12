<?php

namespace App\Routing;

use App\Http\Controllers\Faq_controller;
use App\Http\Controllers\L1promo_controller;
use App\Http\Controllers\Login_controller;
use App\Http\Controllers\ProfilUser_controller;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Offre_controller;
use App\Http\Controllers\Sub_controller;
use App\Http\Controllers\L1home_controller;


Route::get('/', [L1home_controller::class, 'index'])->name('L1sporthome');
Route::get('/L1promo', [L1promo_controller::class, 'index'])->name('L1promo');
Route::get('/Login', [Login_controller::class, 'index'])->name('Login');
Route::get('/Offre', [Offre_controller::class, 'index'])->name('Offre');
Route::get('/Sub', [Sub_controller::class, 'index'])->name('Sub');
Route::get('/Faq', [Faq_controller::class, 'index'])->name('Faq');
Route::get('/ProfilUser', [ProfilUser_controller::class, 'show'])->name('ProfilUser');










/*class L1sporthomeRouter
{
    public static function getRoutes()
    {
        Route::get('/', function () {
            return view('L1sporthome');
        });

        Route::get('/Offre', function () {
            return view('Offre');
        });

        Route::get('/Sub', function () {
            return view('Sub');
        });

        Route::get('/ProfilUser', function () {
            return view('ProfilUser');
        });

        Route::get('/Login', function () {
            return view('Login');
        });

        Route::get('/L1promo', function () {
            return view('L1promo');
        });

        Route::get('/Faq', function () {
            return view('Faq');
        });

    }
        
} */
