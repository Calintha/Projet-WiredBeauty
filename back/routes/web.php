<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
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

Route::get("/Auth/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

Route::group(['middleware' => 'checkRole:Members'], function() {
    Route::get("/members_dashboard", "App\Http\Controllers\Members\DashboardController@index")->name('members_dashboard');
    Route::get("/profile", "App\Http\Controllers\Members\ProfileController@index")->name('members_profile');
    Route::put("/updateProfile/{id}", "App\Http\Controllers\Members\ProfileController@update")->name('members_updateProfile');

    Route::get("/report", "App\Http\Controllers\Members\ReportController@index")->name('members_report');

    Route::get("/template", "App\Http\Controllers\Members\TemplateController@index")->name('members_template');
});

Route::group(['middleware' => 'checkRole:Admin'], function() {
    Route::get("/admin_dashboard", "App\Http\Controllers\Admin\DashboardController@index")->name('admin_dashboard');
});

require __DIR__.'/auth.php';
