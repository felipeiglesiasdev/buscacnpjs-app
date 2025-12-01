<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacidadeController extends Controller
{
    public function index()
    {
        return view('privacidade');
    }
}
