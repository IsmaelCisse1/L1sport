<?php

namespace App\Http\Controllers;

class L1promo_controller extends Controller
{
    public function index()
    {
        $msg = "Page Ligue 1";
        return view('L1promo', compact('msg'));
    }
}
