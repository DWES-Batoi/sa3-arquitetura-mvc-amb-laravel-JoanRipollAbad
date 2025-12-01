<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartitsController;

Route::get('/', fn() => "Benvingut a la Guia d'Equips de Futbol Femení!");
Route::resource('equips', EquipController::class)->except(['edit', 'update', 'destroy']);
Route::resource('estadis', EstadiController::class)->except(['show', 'edit', 'update', 'destroy']);
Route::resource('jugadoras', JugadoraController::class)->except(['show', 'edit', 'update', 'destroy']);
Route::resource('partits', PartitsController::class)->except(['show', 'edit', 'update', 'destroy']);