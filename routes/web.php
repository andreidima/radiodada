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

Route::get('voteaza_si_propune/mesaj', [App\Http\Controllers\VoteazaPropuneController::class, 'mesaj']);

Route::resource('voteaza-si-propune', App\Http\Controllers\VoteazaPropuneController::class)->only([
    'create', 'store'
]);

// Route::any('voteaza-si-propune/adauga', [App\Http\Controllers\VoteazaPropuneController::class, 'voteazaPropune']);

Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('piese');
    // });

    Route::redirect('/', 'piese');

    Route::resource('piese', App\Http\Controllers\PiesaController::class,  ['parameters' => ['piese' => 'piesa']]);

    Route::resource('artisti', App\Http\Controllers\ArtistController::class,  ['parameters' => ['artisti' => 'artist']]);

    Route::resource('propuneri', App\Http\Controllers\PropunereController::class,  ['parameters' => ['propuneri' => 'propunere']]);

    Route::get('/piese/categorie/{categorie}', [App\Http\Controllers\PiesaController::class, 'index']);

    // Route::post('/voteaza-si-propune', [App\Http\Controllers\VoteazaPropuneController::class, 'store']);
});

