<?php

use App\Http\Controllers\BbsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CsvDownloadController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/admin',[BbsController::class,'admin']);

    Route::get('/edit/{message}',[BbsController::class,'edit']);
    Route::post('/edit/{message}',[BbsController::class,'update']);

    Route::get('/csv-download', [CsvDownloadController::class, 'downloadCsv']);

    Route::get('/delete/{message}',[BbsController::class,'delete']);
});

require __DIR__.'/auth.php';
