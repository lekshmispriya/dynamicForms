<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Form_controller;
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

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/addForm', [Form_controller::class, 'getElements'])->name('addForm');
Route::any('/editForm/{id}', [Form_controller::class, 'editForm'])->name('editForm');
//Route::get('editForm/(:any)', array('as' => 'editForm', 'uses' => 'Form_controller@editForm'));

Route::post('/saveForm', [Form_controller::class, 'saveForm'])->name('saveForm');
Route::post('/ajaxForm', [Form_controller::class, 'ajaxForm'])->name('ajaxForm');
Route::post('/updateForm', [Form_controller::class, 'updateForm'])->name('updateForm');
Route::any('/viewForm/{id}', [Form_controller::class, 'viewForm'])->name('viewForm');
Route::post('/deleteForm', [Form_controller::class, 'deleteForm'])->name('deleteForm');

require __DIR__.'/auth.php';
