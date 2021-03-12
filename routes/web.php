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


Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });    

    Route::resource('piese', App\Http\Controllers\PiesaController::class,  ['parameters' => ['piese' => 'piesa']]);

    Route::get('/piese/categorie/{categorie}', [App\Http\Controllers\PiesaController::class, 'index']);

    Route::get('/voteaza-si-propune', [App\Http\Controllers\VoteazaPropuneController::class, 'create']);
    Route::post('/voteaza-si-propune', [App\Http\Controllers\VoteazaPropuneController::class, 'store']);
});

