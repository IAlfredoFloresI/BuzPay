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
use App\Http\Middleware\UserTypeMiddleware;




Route::get('/', function () {
    return view('index');
});


Route::post('/face-login', [FaceAuthController::class, 'authenticate'])->name('face.authenticate');



Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');;


Route::get('/empleado', function () {
    return view('empleados.index'); // Vista para empleados
})->name('empleado.index');

Route::get('/cliente', function () {
    return view('clientes.index'); // Vista para clientes
})->name('cliente.index');


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



require __DIR__ . '/auth.php';



//Consultar tarjeta
// routes/api.php
Route::get('/cliente/{id}', [RecargaController::class, 'getClienteData']);
Route::post('/consultar-datos-tarjeta', [CardController::class, 'getCardDetails'])->name('card.getDetails'); // Ruta para consultar saldo y vencimiento


Route::get('/admin/card', [CardController::class, 'index'])->name('admin.card');
Route::post('/admin/get-card-details', [CardController::class, 'getCardDetails']);
Route::get('/admin/consultar-saldo', [CardController::class, 'show'])->name('card.consultar');
Route::get('/admin/card', [CardController::class, 'index']);
Route::get('/consultar-tarjeta', [CardController::class, 'getCardDetails']);

//Recargar tarjeta
// Ruta para mostrar la vista de recarga
Route::get('/admin/recarga', function () {
    return view('admin.recargarTarjeta');
})->name('recarga.form');

Route::post('/admin/recarga', [RecargaController::class, 'realizarRecarga']);
Route::get('/admin/cliente/{id}', [RecargaController::class, 'obtenerDatosDelCliente']);


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
// Ruta para mostrar la lista de empleados
Route::get('/employees', [RegisterController::class, 'index'])->name('employees.index');

// Ruta para la acción de obtener la lista de empleados (usada en el script)
Route::get('/employees/list', [RegisterController::class, 'list'])->name('employees.list');

// Otras rutas para crear, editar, eliminar empleados...
Route::post('/employees/register', [RegisterController::class, 'store'])->name('employees.register');
Route::get('/employees/{id}', [RegisterController::class, 'show'])->name('employees.show');
Route::put('/employees/update/{id}', [RegisterController::class, 'update'])->name('employees.update');
Route::delete('/employees/delete/{id}', [RegisterController::class, 'destroy'])->name('employees.delete');


//AQUÍ COMINEZAN LAS PÁGINAS PARA EMPLEADOS


//Página para los empleados
Route::get('/empleados', function () {
    return view('Empleados.index');
})->name('Empleados.index');;

// Ruta para mostrar la vista de recarga de la página para empleados
Route::get('/empleados/recarga_Empleados', function () {
    return view('admin.recargaTarjetaE');
})->name('recarga.empleados'); //Verificar posibles fallas en otra página

//Ruta para mostrar la página de consultar saldo (empleados)
Route::get('/empleados/consultar_saldo', function () {
    return view('admin.cardE');
})->name('tarjeta.empleados');

//Ruta para mostrar la página de cierre de caja para empleados
Route::get('/empleados/cierre_caja', function () {
    return view('Cierre_Caja.CierreCajaE');
})->name('CierreCaja.empleados');
