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

Route::resource('equilibrio ', 'EquilibrioController');



