<?php

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

Route::get("/dashboard", "App\Http\Controllers\Members\DashboardController@index")->middleware(['auth'])->name('members_dashboard');
Route::get("/profile", "App\Http\Controllers\Members\ProfileController@index")->middleware(['auth'])->name('members_profile');
Route::put("/updateProfile/{id}", "App\Http\Controllers\Members\ProfileController@update")->middleware(['auth'])->name('members_updateProfile');

require __DIR__.'/auth.php';
