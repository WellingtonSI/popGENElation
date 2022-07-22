<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutacaoController extends Controller
{
    public function recorrente(){
        return view('Mutacao.recorrente');
    }
    public function q_variado(Request $request)
    {
        return  $request->u*$request->p-$request->v*$request->q;
    }
    public function quantidade_geracoes(Request $request)
    {
        
        return  (1/($request->u+$request->v))*(log(($request->q0 - $request->q)/($request->qn - $request->q)));
    }
    public function nao_recorrente(){
        return view('Mutacao.nao_recorrente');
    }
    public function perda_alelos($geracao)
    {
        $e = 2.71828;
        if($geracao == 0){
            $resultado = 1/$e;
        }else{
           
            $anterior = 1/$e;
            for($i=1;$i<=$geracao;$i++){
                $resultado = 1/(pow($e,1-$anterior));
                $anterior = $resultado;
               
            }
        }

        return  number_format($resultado, 4, '.', '');
    }
}
