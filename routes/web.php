<?php

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



//manage profile
//manage products


/*
|--------------------------------------------------------------------------
| admin middleware
|--------------------------------------------------------------------------
*/
//manage users and roles
//manage categories
//manage auctions
//statistics dashboard



/*
|--------------------------------------------------------------------------
| seller middleware
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| client middleware
|--------------------------------------------------------------------------
*/




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
