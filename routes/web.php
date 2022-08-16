<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Routes Admin
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'showAdminMenu']);
    });
});

// Routes Administration
Route::middleware(['auth', 'role_id:2'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showAdministrationMenu']);
});


require __DIR__.'/auth.php';
