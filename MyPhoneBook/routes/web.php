<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\CollaborateurController;

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
    return view('dashboard');
})->middleware(['auth']);

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/entreprise/delete', [EntrepriseController::class, 'delete_hub']);
    Route::delete('/entreprise/delete/{id}', [EntrepriseController::class, 'delete_fromid']);
    Route::get('/collaborateur/delete', [CollaborateurController::class, 'delete_hub']);
    Route::delete('/collaborateur/delete/{id}', [CollaborateurController::class, 'delete_fromid']);
});

Route::middleware(['auth', 'gestionnaire'])->group(function (){
    Route::get('/entreprise/create', [EntrepriseController::class, 'add_form']);
    Route::post('/entreprise/create/success', [EntrepriseController::class, 'get_entreprise_form']);
    Route::get('/entreprise/modify/{id}', [EntrepriseController::class, 'modify_form']);
    Route::post('/entreprise/modify/{id}/success', [EntrepriseController::class, 'modify_fromid']);
    Route::get('/collaborateur/create', [CollaborateurController::class, 'add_form']);
    Route::post('/collaborateur/create/success', [CollaborateurController::class, 'get_collab_info']);
    Route::get('/collaborateur/modify/{id}', [CollaborateurController::class, 'modify_form']);
    Route::post('/collaborateur/modify/{id}/success', [CollaborateurController::class, 'modify_fromid']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/entreprise/list', [EntrepriseController::class, 'list']);
    Route::get('/collaborateur/list', [CollaborateurController::class, 'list']);
    Route::get('/entreprise/{id}', [EntrepriseController::class, 'lookup']);
});

/*
Route::group(['prefix' => '/entreprise'], function () {
    Route::get('/create', [EntrepriseController::class, 'add_form']);
    Route::post('/create/success', [EntrepriseController::class, 'get_entreprise_form']);
    Route::get('/list', [EntrepriseController::class, 'list']);
    Route::get('/delete', [EntrepriseController::class, 'delete_hub']);
    Route::delete('/delete/{id}', [EntrepriseController::class, 'delete_fromid']);
    Route::get('/modify/{id}', [EntrepriseController::class, 'modify_form']);
    Route::post('/modify/{id}/success', [EntrepriseController::class, 'modify_fromid']);
});
*/
/*
Route::group(['prefix' => '/collaborateur'], function () {
    Route::get('/create', [CollaborateurController::class, 'add_form']);
    Route::post('/create/success', [CollaborateurController::class, 'get_collab_info']);
    Route::get('/create', [CollaborateurController::class, 'add_form']);
    Route::get('/list', [CollaborateurController::class, 'list']);
    Route::get('/delete', [CollaborateurController::class, 'delete_hub']);
    Route::delete('/delete/{id}', [CollaborateurController::class, 'delete_fromid']);
    Route::get('/modify/{id}', [CollaborateurController::class, 'modify_form']);
    Route::post('/modify/{id}/success', [CollaborateurController::class, 'modify_fromid']);
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
