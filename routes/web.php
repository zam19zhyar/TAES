<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::post('/login/student', [\App\Http\Controllers\LoginController::class, 'loginStudent'])->name('login.student');
Route::post('/login/ta', [\App\Http\Controllers\LoginController::class, 'loginProfessor'])->name('login.professor');
Route::post('/login/professor', [\App\Http\Controllers\LoginController::class, 'loginTa'])->name('login.ta');

Route::get('/evaluate/{ta}', [\App\Http\Controllers\EvaluationController::class, 'index'])->name('evaluation.show');
Route::get('/evaluation/{evaluation}', [\App\Http\Controllers\EvaluationController::class, 'review'])->name('evaluation.review');
Route::post('/evaluation/approve/{evaluation}', [\App\Http\Controllers\EvaluationController::class, 'approve'])->name('evaluation.approve');

Route::post('/evaluate/create', [\App\Http\Controllers\EvaluationController::class, 'create'])->name('evaluate.create');

Route::get('/course/{course}', [\App\Http\Controllers\CourseController::class, 'index'])->name('course.show');
