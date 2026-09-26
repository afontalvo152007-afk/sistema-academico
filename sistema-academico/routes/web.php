<?php

use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;

// Página de inicio: redirige al listado de estudiantes
Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

/* ============================================================
 |  ESTUDIANTES
 * ============================================================ */
Route::get('/estudiantes', [SistemaController::class, 'indexEstudiantes'])->name('estudiantes.index');
Route::get('/estudiantes/crear', [SistemaController::class, 'createEstudiante'])->name('estudiantes.crear');
Route::post('/estudiantes', [SistemaController::class, 'storeEstudiante'])->name('estudiantes.store');
Route::get('/estudiantes/{estudiante}/editar', [SistemaController::class, 'editEstudiante'])->name('estudiantes.editar');
Route::put('/estudiantes/{estudiante}', [SistemaController::class, 'updateEstudiante'])->name('estudiantes.update');
Route::delete('/estudiantes/{estudiante}', [SistemaController::class, 'destroyEstudiante'])->name('estudiantes.destroy');

/* ============================================================
 |  PROFESORES
 * ============================================================ */
Route::get('/profesores', [SistemaController::class, 'indexProfesores'])->name('profesores.index');
Route::get('/profesores/crear', [SistemaController::class, 'createProfesor'])->name('profesores.crear');
Route::post('/profesores', [SistemaController::class, 'storeProfesor'])->name('profesores.store');
Route::get('/profesores/{profesor}/editar', [SistemaController::class, 'editProfesor'])->name('profesores.editar');
Route::put('/profesores/{profesor}', [SistemaController::class, 'updateProfesor'])->name('profesores.update');
Route::delete('/profesores/{profesor}', [SistemaController::class, 'destroyProfesor'])->name('profesores.destroy');

/* ============================================================
 |  MATERIAS
 * ============================================================ */
Route::get('/materias', [SistemaController::class, 'indexMaterias'])->name('materias.index');
Route::get('/materias/crear', [SistemaController::class, 'createMateria'])->name('materias.crear');
Route::post('/materias', [SistemaController::class, 'storeMateria'])->name('materias.store');
Route::get('/materias/{materia}/editar', [SistemaController::class, 'editMateria'])->name('materias.editar');
Route::put('/materias/{materia}', [SistemaController::class, 'updateMateria'])->name('materias.update');
Route::delete('/materias/{materia}', [SistemaController::class, 'destroyMateria'])->name('materias.destroy');
