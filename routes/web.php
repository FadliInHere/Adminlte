<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',\App\Http\Controllers\UserController::class)
->middleware('auth');

Route::resource('siswas',\App\Http\Controllers\SiswaController::class)
->middleware('auth');

Route::resource('kelass',\App\Http\Controllers\KelasController::class)
->middleware('auth');

Route::get('/join/innerjoin', [JoinController::class, 'innerJoin'])->name('join.innerjoin');
Route::get('/join/leftjoin', [JoinController::class, 'leftJoin'])->name('join.leftjoin');
Route::delete('/siswas/{id}', 'SiswaController@destroy')->name('siswas.destroy');
Route::delete('/kelass/{kelas}', [KelasController::class, 'destroy'])->name('kelass.destroy');





