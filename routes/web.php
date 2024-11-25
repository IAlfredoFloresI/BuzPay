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
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\UserTypeMiddleware;
use App\Services\PayPalService;
use Illuminate\Http\Request;




Route::get('/', function () {
    return view('index');
});


Route::post('/face-login', [FaceAuthController::class, 'authenticate'])->name('face.authenticate');



Route::get('/admin', function () {

        // Retornar la vista con la variable
        return view('admin.index');
})->name('admin.index');;


Route::get('/empleado', function () {
    // Retornar la vista con la variable
    return view('empleados.index');
})->name('empleado.index');

Route::get('/cliente', function () {
    return view('clientes.index');
})->name('cliente.index');


Route::get('/cliente/recarga', function () {
    return view('admin.RecargaTarjetaU'); // Vista para clientes
})->name('recarga.usuario');

Route::get('/cliente/saldo', function () {
    return view('admin.cardU'); // Vista para clientes
})->name('saldo.usuario');

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
// Formulario de recarga
Route::get('/admin/recarga', function () {
    return view('admin.recargarTarjeta');
})->name('recarga.form');

// Procesar la recarga
Route::post('/admin/recarga', [RecargaController::class, 'realizarRecarga'])->name('recarga.realizar');

// Obtener datos de cliente basado en ID de tarjeta
Route::get('/recarga/{id}', [RecargaController::class, 'obtenerDatosDelCliente'])->name('recarga.cliente');




//Estadistica
Route::get('/estadisticas/recargas-por-mes', [EstadisticaController::class, 'getRecargasPorMes']);
Route::get('/estadisticas/total-recargas-por-tipo', [EstadisticaController::class, 'getTotalRecargasPorTipo'])->name('estadisticas.total-recargas-por-tipo');
Route::view('/estadisticas', 'Estadistica.index')->name('estadisticas');


//Cierre de caja
Route::prefix('cierre-caja')->group(function () {
    Route::get('/cierre-caja/recargas-dia', [CierreCajaController::class, 'getRecargasDia'])->name('cierreCaja.getRecargasDia');
    Route::get('/cierre-caja/fechas-recargas', [CierreCajaController::class, 'getFechasRecargas'])->name('cierreCaja.getFechasRecargas');
    Route::get('/cierre-caja/total-recargas-dia', [CierreCajaController::class, 'getTotalRecargasDia'])->name('cierreCaja.getTotalRecargasDia');
     Route::get('cierre-caja', [CierreCajaController::class, 'index'])->name('cierreCaja.index');
});


//CRUD

// Rutas para la gestión de empleados
Route::get('/employees', [RegisterController::class, 'index'])->name('employees.index');
Route::get('employees/list', [EmployeeController::class, 'list'])->name('employees.list');

Route::post('/employees/contract/{id}', [EmployeeController::class, 'hireClient'])->name('employees.contract'); // Contratar empleado
Route::post('/employees/promote/{id}', [EmployeeController::class, 'promoteEmployee'])->name('employees.promote'); // Promover empleado
Route::post('/employees/fire/{id}', [EmployeeController::class, 'fireEmployee'])->name('employees.fire'); // Despedir empleado






//AQUÍ COMINEZAN LAS PÁGINAS PARA EMPLEADOS


//Página para los empleados
Route::get('/empleados', function () {
    return view('Empleados.index');
})->name('Empleados.index');;

// Ruta para mostrar la vista de recarga de la página para empleados
Route::get('/empleados/recarga_Empleados', function () {
    // Retornar la vista con la variable
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

Route::get('/employees', [RegisterController::class, 'index'])->name('employees.index');
Route::get('/employees/list', [EmployeeController::class, 'list'])->name('employees.list');
Route::post('/employees/contratar', [EmployeeController::class, 'contratar'])->name('employees.contratar');
Route::post('/employees/promover', [EmployeeController::class, 'promover'])->name('employees.promover');
Route::post('/employees/despedir', [EmployeeController::class, 'despedir'])->name('employees.despedir');




// Ruta para cargar los empleados filtrados por clasificación 2 (solo EMPLEADOS)
Route::get('/employees/filtro', [EmployeeController::class, 'getEmployees'])->name('employees.getClients');



//PAYPAL
Route::post('/recargar/paypal', [RecargaController::class, 'iniciarRecargaPayPal'])->name('paypal.recargar');
Route::get('/recarga/success', [RecargaController::class, 'success'])->name('paypal.success');
Route::get('/recarga/cancel', [RecargaController::class, 'cancel'])->name('paypal.cancel');
