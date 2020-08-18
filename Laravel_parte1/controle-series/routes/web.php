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
    return view('welcome');
});

Route::get('/ola', function () {
    echo "Olá Mundo!";
});

Route::get('/series', function () {
    $series = [
        'Grey\'s Anatomy',
        'Lost',
        'Agents of SHIELD'
    ];

    $html = "<ul>";
    foreach ($series as $serie){
      $html .="<li>$serie</li>";
    }
    $html .= "</ul>";

    return $html;
});
