<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_series')->middleware('autenticador');
Route::post('/series/criar', 'SeriesController@store')->middleware('autenticador');
Route::delete('/series/{id}', 'SeriesController@destroy')->middleware('autenticador');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('autenticador');
Route::get('temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporada/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('autenticador');
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
Route::get('/sair', function () {

    Auth::logout();
    return redirect('/entrar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
