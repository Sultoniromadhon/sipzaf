<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataMustahikController;
use App\Http\Controllers\Admin\DetailMustahikController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

/**
 * route for admin
 */

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {

        //route dashboard
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard.index');
        //route resource users
        Route::resource('/user', UserController::class, ['as' => 'admin']);
        //route resource profile
        Route::resource('/profile', ProfileController::class, ['as' => 'admin']);
        //route resource datamustahik
        Route::resource('/datamustahik',DataMustahikController::class,['as' => 'admin']);
        //route resource datailmustahik
        Route::resource('/detailmustahik', DetailMustahikController::class, ['as' => 'admin']);
    });
});
