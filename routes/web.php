<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminController;

Route::get('/admin/inscripciones', [AdminController::class, 'index'])->name('admin.inscripciones');
Route::post('/admin/inscripciones/{id}/confirmar', [AdminController::class, 'confirmar'])->name('admin.confirmar');
Route::post('/admin/inscripciones/{id}/cancelar', [AdminController::class, 'cancelar'])->name('admin.cancelar');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/registro-uam', [RegistroController::class, 'registroUam'])->name('registro.uam');
Route::get('/registro-externa', [RegistroController::class, 'registroExterna'])->name('registro.externa');
Route::post('/registro-uam', [RegistroController::class, 'storeUam'])->name('registro.uam.store');
Route::post('/registro-externa', [RegistroController::class, 'storeExterna'])->name('registro.externa.store');
