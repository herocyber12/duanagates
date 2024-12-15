<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::resource('categories', CategoryController::class);
    Route::resource('materials', MaterialsController::class);
});

Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('materials', [MaterialController::class, 'index']);
});