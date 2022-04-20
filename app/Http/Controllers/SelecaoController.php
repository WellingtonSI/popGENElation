<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelecaoController extends Controller
{
    public function index()
    {
        return view('Selecao.index');
    }
}
