<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#rota da tela inicial
Route::get('/', function () {
    return view('home');
});

#rotas autenticadas
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('users');

Route::post('/users/update-roles', [UserController::class, 'updateRoles'])
    ->middleware(['auth', 'verified'])
    ->name('users.updateRoles');

#rota do CRUD de contas
Route::resource('accounts', AccountController::class)->middleware(['auth', 'verified']);

#rota criada pelo breeze referente ao profile e com middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
