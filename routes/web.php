<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\klaviyoController;

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

Route::get('/',  [klaviyoController::class , 'index']);
Route::get('/template',  [klaviyoController::class , 'template']);
Route::get('/ctemplate',  [klaviyoController::class , 'create_template']);
Route::get('/utemplate',  [klaviyoController::class , 'update_template']);
Route::get('/dtemplate',  [klaviyoController::class , 'delete_template']);
Route::get('/clonetemplate',  [klaviyoController::class , 'clone_template']);
Route::get('/rendertemplate',  [klaviyoController::class , 'render_template']);
Route::get('/compaigns',  [klaviyoController::class , 'get_compaigns']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

