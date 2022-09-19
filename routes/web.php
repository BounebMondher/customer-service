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

Auth::routes();

Route::get('/threads/show/{id}', [App\Http\Controllers\ThreadController::class, 'show'])->name('threads');
Route::group(['middleware' => 'auth'], function () {
    Route::get('threads', ['as' => 'threads', 'uses' => 'App\Http\Controllers\ThreadController@index']);
    Route::get('threads/show/{id}', ['as' => 'threads.show', 'uses' => 'App\Http\Controllers\ThreadController@show']);
});