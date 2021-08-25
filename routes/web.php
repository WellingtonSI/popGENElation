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
// Route::get('/equilibrio', function () {
//     return view('Equilibrio.index');
// });


Route::get('/equilibrio/atualizar', ['uses' => 'EquilibrioController@atualizar']);

Route::resource('equilibrio ', 'EquilibrioController');

// Route::group(['prefix' => 'equilibrio'], function () {
//     Route::get('/', ['uses' => 'EquilibrioController@index']);
//     Route::get('/atualizar', ['uses' => 'EquilibrioController@atualizar']);
// });


