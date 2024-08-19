<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota gerar Token.
Route::post('/', [LoginController::class, 'login'])->name('login');

// Rotas públicas UserController

Route::get('/users', [UserController::class, 'index']); // GET - http://127.0.0.1:8000/api/users?page=1
Route::post('/users', [UserController::class, 'store']); // POST - http://127.0.0.1:8000/api/users
Route::get('/users/{user}', [UserController::class, 'show']); // GET - http://127.0.0.1:8000/api/users/1
Route::put('/users/{user}', [UserController::class, 'update']); // PUT - http://127.0.0.1:8000/api/users/1
Route::delete('/users/{user}', [UserController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/users/1

// Rotas públicas MedicoController
Route::get('/medicos', [MedicoController::class, 'index']); // GET - http://127.0.0.1:8000/api/medicos
Route::get('/medicos/{medico}', [MedicoController::class, 'show']); // GET - http://127.0.0.1:8000/api/medicos/1
Route::get('/medicos/buscaCpf/{cpf}', [MedicoController::class, 'showByCpf']); // GET - http://127.0.0.1:8000/api//medicos/buscaCpf/12345678902

// Rotas privadas MedicoController. No Postman em Headers informar "Authorization" em Key e "Beaer + token" em Value
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/medicos', [MedicoController::class, 'store']); // POST - http://127.0.0.1:8000/api/medicos
    Route::put('/medicos/{medico}', [MedicoController::class, 'update']); // PUT - http://127.0.0.1:8000/api/medicos/1
    Route::delete('/medicos/{medico}', [MedicoController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/medicos/1
});