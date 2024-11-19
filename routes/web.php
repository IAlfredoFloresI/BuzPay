<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RecargaController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\CierreCajaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\FaceAuthController;




Route::get('/', function () {
    return view('index');
});


Route::post('/face-login', [FaceAuthController::class, 'authenticate'])->name('face.authenticate');



Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']); // Ruta para almacenar el usuario

Route::post('face-authenticate', [FaceAuthController::class, 'authenticate']); // Ruta para la autenticación con FaceID



require __DIR__.'/auth.php';



//Consultar tarjeta
// routes/api.php
Route::get('/cliente/{id}', [RecargaController::class, 'getClienteData']);


Route::get('/admin/card', [CardController::class, 'index'])->name('admin.card');
Route::post('/admin/get-card-details', [CardController::class, 'getCardDetails']);
Route::get('/admin/consultar-saldo', [CardController::class, 'show'])->name('card.consultar');

//Recargar tarjeta
// Ruta para mostrar la vista de recarga
Route::get('/admin/recarga', function () {
    return view('admin.recargarTarjeta');
})->name('recarga.form');

Route::post('/admin/recarga', [RecargaController::class, 'realizarRecarga'])->name('recarga.realizar');

//Estadistica
Route::get('/estadisticas/recargas-por-mes', [EstadisticaController::class, 'getRecargasPorMes']);
Route::get('/estadisticas/total-recargas-por-tipo', [EstadisticaController::class, 'getTotalRecargasPorTipo'])->name('estadisticas.total-recargas-por-tipo');
Route::view('/estadisticas', 'Estadistica.index')->name('estadisticas');


//Cierre de caja
Route::prefix('cierre-caja')->group(function () {
    Route::get('get-recargas-dia', [CierreCajaController::class, 'getRecargasDia'])->name('cierreCaja.getRecargasDia');
    Route::get('get-total-recargas-dia', [CierreCajaController::class, 'getTotalRecargasDia'])->name('cierreCaja.getTotalRecargasDia');
    Route::get('get-fechas-recargas', [CierreCajaController::class, 'getFechasRecargas'])->name('cierreCaja.getFechasRecargas');
    Route::get('cierre-caja', [CierreCajaController::class, 'index'])->name('cierreCaja.index');

});


//CRUD
Route::prefix('employees')->group(function () {
    Route::get('/list', [RegisterController::class, 'list_empleados']);
    Route::get('/get/{id}', [RegisterController::class, 'get_employee']);
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/update/{id}', [RegisterController::class, 'update']);
    Route::post('/delete/{id}', [RegisterController::class, 'delete']);
    Route::get('/employees', [RegisterController::class, 'index'])->name('employees.index');
});
