<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlumnesHasCriterisAvaluacioController,
    CicleController,
    CriteriAvaluacioController,
    ModulController,
    ResultatAprenentatgeController,
    RubriquesController,
    TipusUsuariController,
    UsuariController,
    UsuarisHasModulsController,
    HomeController,
    ProfessorController,
    AlumneController
};

// Ruta para la página principal que muestra la vista layouts/main
Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UsuariController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuariController::class, 'login']);
Route::get('/logout', [UsuariController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkAdmin'])->group(function () {
        Route::resource('usuaris', UsuariController::class);
    });

    Route::middleware(['checkProfe'])->group(function () {
        Route::get('/professors/index', function () {
            return view('professors.index');
        })->name('professors.index');
    });

    Route::middleware(['checkAlumne'])->group(function () {
        Route::get('/alumnes/autoavaluacio', function () {
            return view('alumnes.index');
        })->name('alumnes.autoavaluacio');

        Route::get('/alumnes/autoavaluacio/{moduleId}', function () {
            return view('alumnes.autoavaluacio');
        })->name('alumnes.autoavaluacio.evaluate');
    });

    Route::get('/home', function () {
        $user = Auth::user();
        return view('home', compact('user'));
    });
});
