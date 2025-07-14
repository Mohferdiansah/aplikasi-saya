<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProgressController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [TaskController::class, 'index'])->name('dashboard');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/tasks/{id}/selesai', [TaskController::class, 'selesaikan'])->name('tasks.selesai');

Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');

Route::get('/calendar', [TaskController::class, 'calendar'])->name('tasks.calendar');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

