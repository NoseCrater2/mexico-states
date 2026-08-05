<?php

use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StateController::class, 'index'])->name('dashboard');
Route::get('/states', [StateController::class, 'getStates'])->name('states');
Route::get('/states/{id}', [StateController::class, 'showState'])->name('states.show');
