<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [FileController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/files/destroy/{if}', [FileController::class, 'destroy'])->name('file.destroy');

Route::middleware(['auth:sanctum', 'verified'])->resource('files', FileController::class);
