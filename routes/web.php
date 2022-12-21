<?php

use App\Http\Controllers\PostController;
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

Route::group(['controller' => PostController::class], function () {
    Route::get('/', 'index')->name('home');
    Route::get('/show/{post}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
});