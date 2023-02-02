<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/product/{id}', [HomeController::class, 'productDetails'])->name('productDetail');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}/auction', [HomeController::class, 'productDetails']);



Auth::routes();

Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('updateProfile');
Route::post('/profile/update/password/{id}', [ProfileController::class, 'updatePassword'])->name('updateProfilePassword');
Route::get('/profile', [ProfileController::class, 'index']);


Route::post('/auction/product/{id}', [AuctionController::class, 'addPrice'])->name('addprice');







//manage profile
//manage products


/*
|--------------------------------------------------------------------------
| admin middleware
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['admin', 'auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/new', [CategoryController::class, 'create'])->name('newCatPage');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('/categories/etit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('destroyCategory');

    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/user/{id}', [AdminController::class, 'showUser'])->name('showUser');

    Route::get('admin/biens', [AdminController::class, 'biens'])->name('adminBiens');

    Route::get('/encheres', [AdminController::class, 'encheres']);
});





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
Route::get('/bienes/delete/{id}', [BienController::class, 'destroy'])->name('deleteBien');
Route::get('/bienes/show/{id}', [BienController::class, 'show'])->name('showBien');



/*
|--------------------------------------------------------------------------
| client middleware
|--------------------------------------------------------------------------
*/




