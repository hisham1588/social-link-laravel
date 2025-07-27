<?php

use App\Http\Controllers\SociallinkController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SociallinkController::class, 'homePage']);


Route::post('/add-item', [SociallinkController::class, 'addItem'])->name('add-item');
Route::get('/delete-item/{id}', [SociallinkController::class, 'deleteItem'])->name('delete-item');
Route::post('/update-item/{id}', [SociallinkController::class, 'updatesociallink'])->name('update-item');
Route::get('/status-change/{id}', [SociallinkController::class, 'statusChange'])->name('status-change');
