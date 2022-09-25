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
    Route::get('threads/create', ['as' => 'threads.create', 'uses' => 'App\Http\Controllers\ThreadController@create']);
    Route::post('threads/store', ['as' => 'threads.store', 'uses' => 'App\Http\Controllers\ThreadController@store']);
    Route::post('threads/storemessage', ['as' => 'threads.storemessage', 'uses' => 'App\Http\Controllers\ThreadController@storeMessage']);
});