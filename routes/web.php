<?php

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\TodoController;
Route::get('/tareas', [TodoController::class, 'index'])->name('tareas.index');
Route::post('/tareas', [TodoController::class, 'store'])->name('tareas.store');
Route::patch('/tareas/{id}/status', [TodoController::class, 'updateStatus'])->name('tareas.updateStatus');
Route::delete('/tareas/{id}', [TodoController::class, 'destroy'])->name('tareas.destroy');


use App\Http\Controllers\TipController;
Route::get('/propinas', [TipController::class, 'index'])->name('propinas.index');
Route::post('/propinas', [TipController::class, 'calculate'])->name('propinas.calculate');


use App\Http\Controllers\SurveyController;
Route::get('/encuestas', [SurveyController::class, 'index'])->name('encuestas.index');
Route::post('/encuestas', [SurveyController::class, 'store'])->name('encuestas.store');
Route::post('/encuestas/{id}/responder', [SurveyController::class, 'respond'])->name('encuestas.respond');


use App\Http\Controllers\RecipeController;
Route::get('/recetas', [RecipeController::class, 'index'])->name('recetas.index');
Route::post('/recetas/favorite', [RecipeController::class, 'toggle'])->name('recetas.favorite');


use App\Http\Controllers\PasswordController;
Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
Route::post('/password/generate', [PasswordController::class, 'generate'])->name('password.generate');


use App\Http\Controllers\NotesController;
Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
Route::post('/notes', [NotesController::class, 'store'])->name('notes.store');


use App\Http\Controllers\ExpensesController;
Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');
Route::post('/expenses', [ExpensesController::class, 'store'])->name('expenses.store');


use App\Http\Controllers\CalendarController;
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::get('/calendar/{id}/delete', [CalendarController::class, 'destroy'])->name('calendar.delete');
Route::get('/calendar/{id}/edit', [CalendarController::class, 'edit'])->name('calendar.edit');
Route::post('/calendar/{id}/edit', [CalendarController::class, 'update'])->name('calendar.update');


use App\Http\Controllers\BookingController;
Route::get('/reservas', [BookingController::class, 'index'])->name('booking.index');
Route::post('/reservas/slots', [BookingController::class, 'slots'])->name('booking.slots');
Route::post('/reservas/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::get('/reservas/hecho', [BookingController::class, 'done'])->name('booking.done');


use App\Http\Controllers\MemoryController;
Route::get('/memoria', [MemoryController::class, 'index'])->name('memory.index');


use App\Http\Controllers\StopwatchController;
Route::get('/cronometro', [StopwatchController::class, 'index'])->name('stopwatch.index');
