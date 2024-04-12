<?php

use App\Http\Controllers\BbsController;
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

Route::get('/',[BbsController::class,'index']);
Route::post('/bbs_add',[BbsController::class,'add']);

Route::get('/admin',[BbsController::class,'admin']);
Route::post('/admin',[BbsController::class,'admin']);

Route::get('/delete',[BbsController::class,'delete']);

Route::get('/download',[BbsController::class,'download']);

Route::get('/edit',[BbsController::class,'edit']);
