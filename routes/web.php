<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/profile', [ProfileController::class, 'index']);



Route::get('/users', [AdminController::class, 'users']);
Route::get('/encheres', [AdminController::class, 'encheres']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('updateProfile');
Route::post('/profile/update/password/{id}', [ProfileController::class, 'updatePassword'])->name('updateProfilePassword');








//manage profile
//manage products


/*
|--------------------------------------------------------------------------
| admin middleware
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/new', [CategoryController::class, 'create'])->name('newCatPage');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('storeCategory');
Route::get('/categories/etit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('updateCategory');
Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('destroyCategory');
//manage users and roles
//manage auctions
//statistics dashboard



/*
|--------------------------------------------------------------------------
| seller middleware
|--------------------------------------------------------------------------
*/
Route::get('/bienes', [BienController::class, 'index'])->name('biens');
Route::get('/bienes/new', [BienController::class, 'create'])->name('newBien');
Route::post('/bienes/store', [BienController::class, 'store'])->name('storeBien');
Route::get('/bienes/edit/{id}', [BienController::class, 'edit'])->name('editBien');
Route::post('/bienes/update/{id}', [BienController::class, 'update'])->name('updateBien');
Route::post('/bienes/delete/{id}', [BienController::class, 'delete'])->name('deleteBien');



/*
|--------------------------------------------------------------------------
| client middleware
|--------------------------------------------------------------------------
*/




