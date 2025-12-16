<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

// -----------------------------
// AUTH ROUTES
// -----------------------------
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// -----------------------------
// PROTECTED ROUTES (AUTH REQUIRED)
// -----------------------------
Route::middleware(['auth'])->group(function () {

    // Redirect root to products index
    Route::get('/', function () {
        return redirect()->route('products.index');
    });

    // CRUD Products
    Route::resource('products', ProductController::class);

    // CRUD Categories
    Route::resource('categories', CategoryController::class);

 // Transactions
Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

});
