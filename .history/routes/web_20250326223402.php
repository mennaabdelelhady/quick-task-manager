<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('tasks',TaskController::class);
Route::patch('tasks/{task}/toggle-status',[TaskController::class,'toggleStatus'])->name('tasks.toggleStatus');