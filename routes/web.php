<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommerceController;


Route::get('/', [CommerceController::class, 'index'])->name('commerces.index');

Route::get('commerces/{commerce}', [CommerceController::class, 'show'])->name('commerces.show');

Route::get('category/{category}', [CommerceController::class, 'category'])->name('commerces.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index');
})->name('admin');
