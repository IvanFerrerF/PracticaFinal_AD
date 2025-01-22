<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\TemporadaController;

Route::apiResource('estudiantes', EstudianteController::class);
Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('temporadas', TemporadaController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('asignaturas', AsignaturaController::class);
Route::apiResource('matriculas', MatriculaController::class);
Route::apiResource('evaluaciones', EvaluacionController::class);




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
