<?php

use App\Models\listing;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


//All listing 
Route::get('/', [ListingController::class, 'index']);



//show Create form hellman 1
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


//storing listing data in database hellman 5

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth'); 

Route::get('/listings/{listing}/edit',
[
    ListingController::class, 'edit'
])->middleware('auth');


//update submit to update

Route::put('listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

//delete submit to update

Route::delete('listings/{listing}',[ListingController::class, 'destory'])->middleware('auth');

//manage the listings
Route::get('listings/manage',[ListingController::class, 'manage'])->middleware('auth');


//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']); 

//Show Register/Create form
Route::get('/register', [UserController::class,'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class,'store']);

//Log user Out
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');


//show login form
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Login In User
Route::post('/users/authenticate', [UserController::class,'authenticate']);
