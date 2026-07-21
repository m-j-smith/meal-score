<?php

use App\Http\Controllers\DiningTableController;
use App\Models\DiningTable;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DiningTableController::class, 'index'])->name('dining-tables.index');

    Route::get('/dining-tables/create', [DiningTableController::class, 'create'])->name('dining-tables.create')->can('create', DiningTable::class);
    Route::post('/dining-tables', [DiningTableController::class, 'store'])->name('dining-tables.store')->can('create', DiningTable::class);
    Route::get('/dining-tables/{diningTable}', [DiningTableController::class, 'show'])->name('dining-tables.show')->can('view', 'diningTable');
    Route::delete('/dining-tables/{diningTable}', [DiningTableController::class, 'destroy'])->name('dining-tables.destroy')->can('delete', 'diningTable');
    Route::get('/dining-tables/{diningTable}/edit', [DiningTableController::class, 'edit'])->name('dining-tables.edit')->can('update', 'diningTable');
    Route::patch('/dining-tables/{diningTable}', [DiningTableController::class, 'update'])->name('dining-tables.update')->can('update', 'diningTable');
});
