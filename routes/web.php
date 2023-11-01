<?php

use App\Http\Controllers\LisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome2');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user', [LisController::class, 'index'])->name('user.index');
    Route::get('/user/create', [LisController::class, 'create'])->name('user.create');
    Route::get('/user/{id}/show', [LisController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [LisController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}', [LisController::class, 'update'])->name('user.update');
    Route::post('/user/store', [LisController::class, 'store'])->name('user.store');
    Route::delete('/user/destroy/{id}', [LisController::class, 'destroy'])->name('user.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/apiget/{id}', [ApiController::class, 'getId'])->name('apiget');

require __DIR__ . '/auth.php';
