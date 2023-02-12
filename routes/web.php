<?php

use App\Http\Controllers\AdminController;
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

Route::group(['controller' => PostController::class, 'as' => 'blog.'], __DIR__ . '/web/blogRoutes.php');
Route::group(['controller' => AdminController::class, 'as' => 'admin.', 'prefix' => 'admin'], __DIR__ . '/web/adminRoutes.php');
