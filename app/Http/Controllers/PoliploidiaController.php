<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliploidiaController extends Controller
{
    public function index()
    {
        return view('Poliploidia.index');
    }
}
