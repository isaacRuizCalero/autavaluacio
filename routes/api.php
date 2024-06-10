<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResultatAprenentatgeController;
use App\Http\Controllers\Api\CriteriAvaluacioController;
use App\Http\Controllers\Api\RubriquesController;
use App\Http\Controllers\Api\ModulController;
use App\Http\Controllers\Api\AutoavaluacioController;

Route::get('/resultat-aprenentatge', [ResultatAprenentatgeController::class, 'index']);
Route::get('/criteri-avaluacio', [CriteriAvaluacioController::class, 'index']);
Route::get('/rubriques', [RubriquesController::class, 'index']);
Route::apiResource('rubriques', RubriquesController::class);
Route::apiResource('modul', ModulController::class);

Route::post('/autoavaluacio', [AutoavaluacioController::class, 'store']);
Route::get('/autoavaluacio', [AutoavaluacioController::class, 'index']);
Route::get('/autoavaluacio/{id}', [AutoavaluacioController::class, 'show']);
