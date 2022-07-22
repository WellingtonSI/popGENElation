<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


Route::group(['prefix' => 'equilibrio'], function () {
    Route::get('/atualizar-mapa', ['uses' => 'EquilibrioController@atualizar_mapa']);
    Route::get('/todas-geracoes/atualizar-mapa', ['uses' => 'EquilibrioController@atualizar_mapa']);
    Route::get('/todas-geracoes', ['uses' => 'EquilibrioController@todas_geracoes']);
    Route::get('/por-geracao', ['uses' => 'EquilibrioController@por_geracao']);
});
Route::get('sexo/atualizar-mapa', ['uses' => 'SexoController@atualizar_mapa']);

Route::group(['prefix' => 'mutacao'], function () {
    Route::get('/recorrente', ['uses'=> 'MutacaoController@recorrente']);
    Route::get('/recorrente/calc','MutacaoController@q_variado');
    Route::get('/recorrente/calc2','MutacaoController@quantidade_geracoes');
    Route::get('/nao-recorrente','MutacaoController@nao_recorrente');
    Route::get('/nao-recorrente/perda-alelos/{geracao}','MutacaoController@perda_alelos');
});

Route::group(['prefix' => 'selecao'], function () {
    Route::get('/completa', ['uses' => 'SelecaoController@completo']);
    Route::get('/completa/contra-dominante', ['uses' => 'SelecaoController@contra_dominante']);
    Route::get('/completa/contra-recessivo-parcial', ['uses' => 'SelecaoController@contra_recessivo_parcial']);
    Route::get('/completa/contra-recessivo-completo', ['uses' => 'SelecaoController@contra_recessivo_completo']);
    Route::get('/completa/contra-heterozigoto', ['uses' => 'SelecaoController@contra_heterozigoto']);
    Route::get('/completa/contra-homozigoto', ['uses' => 'SelecaoController@contra_homozigoto']);
    Route::get('/incompleta', ['uses' => 'SelecaoController@incompleta']);
});

Route::resource('equilibrio ', 'EquilibrioController');
Route::resource('sexo', 'SexoController');
Route::resource('polialelia', 'PolialeliaController');
Route::resource('poliploidia', 'PoliploidiaController');
Route::resource('selecao', 'SelecaoController');



