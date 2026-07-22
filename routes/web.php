<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuariocontroller;
use App\Http\Controllers\ProveedoresController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role_id;
    if ($role == 1) {
        return view('admin.dashboard');
    } elseif ($role == 2) {
        return view('vendedor.dashboard');
    } else {
        return view('clientes.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth'])->group(function () {
    Route::get('/formusuarios',  [Usuariocontroller::class, 'create'])->name('usuarios.create');
    Route::post('/formusuarios', [Usuariocontroller::class, 'store'])->name('usuarios.store');
    Route::get('/formproveedores',  [ProveedoresController::class, 'create'])->name('proveedores.create');
    Route::post('/formproveedores', [ProveedoresController::class, 'store'])->name('proveedores.store');
    Route::get('/usuarios', [Usuariocontroller::class, 'index'])->name('usuarios.index');
    Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');
    Route::post('/listausuarios',[UsuarioController::class, 'update' ])->name('listausuarios.update');
});


