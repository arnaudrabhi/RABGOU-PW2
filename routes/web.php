<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\PostEleveController;
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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:1']], function() {
    Route::get('/dashboard', [AdminController::class, 'showAdminMenu']);
});

// Routes Administration
Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'role:2']], function() {
    Route::get('/dashboard', [AdminController::class, 'showAdministrationMenu']);
});

// Routes creation user
Route::group(['prefix' => 'eleves', 'middleware' => ['auth', 'role:1']], function() {
    Route::post('/add', [PostEleveController::class, 'add']);
    Route::get('/edit/{id}', [PostEleveController::class, 'edit']);
    Route::post('/update/{id}', [PostEleveController::class, 'update']);
    Route::delete('/delete/{id}', [PostEleveController::class, 'delete']);
});



require __DIR__.'/auth.php';
