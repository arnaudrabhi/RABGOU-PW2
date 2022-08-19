<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\PostEleveController;
use App\Http\Controllers\API\PostEnseignantController;
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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::get('/dashboard', [AdminController::class, 'showAdminMenu']);
});

// Routes Administration
Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'role:2']], function() {
    Route::get('/dashboard', [AdministrationController::class, 'showAdministrationMenu']);
});

Route::get('eleves/all', [PostEleveController::class, 'index']);
// Routes creation user
Route::group(['prefix' => 'eleves', 'middleware' => ['auth', 'role:1,2']], function() {

    Route::post('/add', [PostEleveController::class, 'add']);
    Route::get('/edit/{id}', [PostEleveController::class, 'edit']);
    Route::post('/update/{id}', [PostEleveController::class, 'update']);
    Route::delete('/delete/{id}', [PostEleveController::class, 'delete']);
});

// Routes creation enseignant
Route::group(['prefix' => 'enseignants', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::post('/add', [PostEnseignantController::class, 'add']);
    Route::get('/edit/{id}', [PostEnseignantController::class, 'edit']);
    Route::post('/update/{id}', [PostEnseignantController::class, 'update']);
    Route::delete('/delete/{id}', [PostEnseignantController::class, 'delete']);
});



require __DIR__.'/auth.php';
