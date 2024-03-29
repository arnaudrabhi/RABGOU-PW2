<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\CoursController;
use App\Http\Controllers\API\EmargementController;
use App\Http\Controllers\API\GroupeController;
use App\Http\Controllers\CoursViewController;
use App\Http\Controllers\API\ClasseController;
use App\Http\Controllers\API\EleveController;
use App\Http\Controllers\API\EnseignantController;
use App\Http\Controllers\EmargementViewController;
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
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



/**
 * Routes Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::get('/dashboard', [AdminController::class, 'showAdminMenu'])->name('dashboardAdmin');
});

/**
 * Routes Administration
 */
Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'role:2']], function() {
    Route::get('/dashboard', [CoursViewController::class, 'showAdminMenu']);
});

/**
 * Routes Classe
 */
Route::get('classes/all', [ClasseController::class, 'index']);


/**
 * Routes CRUD user
 */


Route::group(['prefix' => 'eleves', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::get('/all', [EleveController::class, 'index']);
    Route::put('/add', [EleveController::class, 'add']);
    Route::get('/edit/{id}', [EleveController::class, 'get']);
    Route::post('/update/{id}', [EleveController::class, 'update']);
    Route::delete('/delete/{id}', [EleveController::class, 'delete']);
});

/**
 * Routes CRUD enseignant
 */
Route::group(['prefix' => 'enseignants', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::put('/add', [EnseignantController::class, 'add']);
    Route::get('/get/{id}', [EnseignantController::class, 'get']);
    Route::post('/update/{id}', [EnseignantController::class, 'update']);
    Route::delete('/delete/{id}', [EnseignantController::class, 'delete']);
});

/**
 * Routes CRUD classe
 */


Route::group(['prefix' => 'classes', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::get('/all', [ClasseController::class, 'index']);
    Route::put('/add', [ClasseController::class, 'add']);
    Route::get('/edit/{id}', [ClasseController::class, 'get']);
    Route::post('/update/{id}', [ClasseController::class, 'update']);
    Route::delete('/delete/{id}', [ClasseController::class, 'delete']);
});


/**
 * Routes CRUD groupe
 */


Route::group(['prefix' => 'groupes', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::get('/all', [GroupeController::class, 'index']);
    Route::put('/add', [GroupeController::class, 'add']);
    Route::get('/edit/{id}', [GroupeController::class, 'get']);
    Route::post('/update/{id}', [GroupeController::class, 'update']);
    Route::delete('/delete/{id}', [GroupeController::class, 'delete']);
});


/**
 * Routes Feuille d'émargement
 */
Route::group(['prefix' => 'emargement', 'middleware' => ['auth', 'role:1,2']], function() {
    Route::get('/', [EmargementViewController::class, 'index'])->name('emargementHome');
});

/**
 * Routes Cours
 */
Route::group(['prefix' => 'cours', 'middleware' => ['auth', 'role:1,2,3,4']], function() {
    Route::get('/', [CoursViewController::class, 'index'])->name('coursHome');
    Route::get('/actual/{id}', function($id) {
        $controller = new CoursController();
        return $controller->getActualCours($id);
    });
    Route::get('{idcours}/sign/{iduser}', function($idcours, $iduser) {
        $controller = new CoursController();
        return $controller->signCours($idcours, $iduser);
    });
    Route::get('{idcours}/hassigned/{iduser}', function($idcours, $iduser) {
        $controller = new CoursController();
        return $controller->hasEleveSigned($idcours, $iduser);
    });
    Route::get('{idcours}/eleves', function($idcours) {
        $controller = new CoursController();
        return $controller->getEleveCours($idcours);
    });

});

Route::get('/emargement/all', [EmargementController::class, 'index']);
Route::get('/emargement/{id}', function($id) {
    $controller = new EmargementController();
    return $controller->getFeuilleData($id);
});
Route::get('/emargement/{idfeuille}/presence/{ideleve}', function($idfeuille, $ideleve) {
    $controller = new EmargementController();
    return $controller->setElevePresence($idfeuille, $ideleve);
});



/*
Route::get('/testgroupe', function () {
   $classe = new Classe([
       'nom' => 'classe 1'
   ]);
   $groupe = new Groupe([
       'libelle' => 'groupe1'
   ]);

   $classe->save();
   $groupe->save();

   $classe->groupes()->attach($groupe);

   $classe->save();
});
*/

require __DIR__.'/auth.php';
