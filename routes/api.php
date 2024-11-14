<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RecargaController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\CierreCajaController;

Route::get('/cliente/{id}', [RecargaController::class, 'getClienteData']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
