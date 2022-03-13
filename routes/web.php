<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('example.dashboard');
    })->name('dashboard');
    Route::get('/form', [ExampleController::class, 'index'])->name('form');
    Route::post('/form/store', [ExampleController::class, 'store'])->name('form.store');
    Route::get('/quill', function () {
        return view('example.quill');
    })->name('quill');
    Route::get('/datatables', function () {
        return view('example.datatables');
    })->name('datatables');
    Route::get('/chartapexjs', function () {
        return view('example.chart');
    })->name('chartapexjs');
});

Route::get('/dashboard', function () {
    return view('example.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
