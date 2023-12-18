<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KerajinanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/', function () {
            return view('dashboard.home');
        });

        // users
        Route::get('/user', [userController::class, 'index'])->name('users.index');
        Route::get('/user/create', [userController::class, 'create'])->name('users.create');
        Route::get('/user/{id}/show', [userController::class, 'show'])->name('users.show');
        Route::get('/user/{id}/edit', [userController::class, 'edit'])->name('users.edit');
        Route::patch('/user/{id}', [userController::class, 'update'])->name('users.update');
        Route::post('/user/store', [userController::class, 'store'])->name('users.store');
        Route::delete('/user/destroy/{id}', [userController::class, 'destroy'])->name('users.destroy');

        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategoris.index');
        Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategoris.create');
        Route::get('/kategori/{id}/show', [KategoriController::class, 'show'])->name('kategoris.show');
        Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategoris.edit');
        Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategoris.update');
        Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategoris.store');
        Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategoris.destroy');

        Route::get('/kerajinan', [KerajinanController::class, 'index'])->name('kerajinans.index');
        Route::get('/kerajinan/create', [KerajinanController::class, 'create'])->name('kerajinans.create');
        Route::get('/kerajinan/{id}/show', [KerajinanController::class, 'show'])->name('kerajinans.show');
        Route::get('/kerajinan/{id}/edit', [KerajinanController::class, 'edit'])->name('kerajinans.edit');
        Route::patch('/kerajinan/{id}', [KerajinanController::class, 'update'])->name('kerajinans.update');
        Route::post('/kerajinan/store', [KerajinanController::class, 'store'])->name('kerajinans.store');
        Route::delete('/kerajinan/destroy/{id}', [KerajinanController::class, 'destroy'])->name('kerajinans.destroy');
    }
);
