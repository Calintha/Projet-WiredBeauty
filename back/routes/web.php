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
    Route::get("/report-generate", "App\Http\Controllers\Members\ReportController@generate")->name('members_generateReport');
    Route::post("/report-import", "App\Http\Controllers\Members\ReportController@importReport")->name('members_importReport');
    Route::post("/file-import", "App\Http\Controllers\Members\ReportController@import")->name('members_importFile');
    Route::get("/report-export", "App\Http\Controllers\Members\ReportController@export")->name('members_exportReport');

    Route::get("/template", "App\Http\Controllers\Members\TemplateController@index")->name('members_template');
});

Route::group(['middleware' => 'checkRole:Admin'], function() {
    Route::get("/admin_dashboard", "App\Http\Controllers\Admin\DashboardController@index")->name('admin_dashboard');
});

require __DIR__.'/auth.php';
