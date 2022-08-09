<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MigracaoController extends Controller
{
    public function index(){
        return view('Migracao.index');
    }

    public function calc(Request $request){

        $m = $request->nm/($request->popx + $request->nm);
    
        return $m*$request->qm+(1-$m)*$request->q0;
    }
}
