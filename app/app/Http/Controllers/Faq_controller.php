<?php

namespace App\Http\Controllers;

class Faq_controller extends Controller
{
    public function index()
    {
        $msg = "FAQ";
        return view('Faq', compact('msg'));
    }
}
