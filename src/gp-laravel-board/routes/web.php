<?php

use App\Http\Controllers\BbsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CsvDownloadController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[BbsController::class,'index']);
Route::post('/bbs_add',[BbsController::class,'add']);

Route::middleware('auth')->group(function () {

    Route::get('/admin',[BbsController::class,'admin']);

    Route::get('/edit/{message}',[BbsController::class,'edit']);
    Route::post('/update',[BbsController::class,'update']);

    Route::get('/csv-download', [CsvDownloadController::class, 'downloadCsv']);

    Route::get('/delete/{message}',[BbsController::class,'delete']);
});

require __DIR__.'/auth.php';
