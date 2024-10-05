<?php

use App\Http\Controllers\Project\Env\EnvController;
use App\Http\Controllers\Project\FileManager\FileManagerController;
use App\Http\Controllers\Project\FileManager\FileManagerUserController;
use App\Http\Controllers\Project\Settings\MainSettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Project\DashboardController;
use App\Http\Controllers\Project\Authentication\AdminLoginController;
use App\Http\Controllers\Project\Settings\SettingController;
use App\Http\Controllers\Project\Authentication\ProfileController;
use App\Http\Controllers\Project\Authentication\ChangePasswordController;
use App\Http\Controllers\Project\Authentication\AdminController;
use App\Http\Controllers\Project\Command\CommandController;
use App\Http\Controllers\Project\Command\TerminalController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    //--------------------------------------------------------
    Route::get('/', [AdminLoginController::class,'index'])->name("admin.form.login");

    Route::group(['prefix' =>"dashboard"], function () {
        Route::group(["middleware" => ["admin","preventBack"]], function () {
            Route::get('/', [DashboardController::class,"index"])->name('dashboard.index')->middleware('admin','preventBack');

            //---------------------------------------------------
            // Route::resource('settings', SettingController::class);

            // Route::resource('env', EnvController::class);
            // Route::resource('file-manager', FileManagerController::class);
            // Route::resource('file-manager-user', FileManagerUserController::class);
            //---------------------------------------------------
            // Route::resource('profile', ProfileController::class);
            // Route::resource('change-password', ChangePasswordController::class);
            // Route::resource('admins', AdminController::class);
            //---------------------------------------------------
            // Route::resource('commands', CommandController::class);
            // Route::resource('terminal', TerminalController::class);
        });

        Route::get('login', [AdminLoginController::class,'index'])->name("admin.form.login");
        Route::post('/login', [AdminLoginController::class,'create'])->name('admin.login');
        Route::get('/logout', [AdminLoginController::class,'store'])->name('admin.logout');

    });
    //--------------------------------------------------------

    // Route::group(['prefix' => 'dashboard/filemanage-user'], function () {
    //     \UniSharp\LaravelFilemanager\Lfm::routes();
    // });
});



