<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\adminC\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckPermission;

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

//  Route::get('login', [LoginController::class,'index'])->name('login_page');


// Route::prefix('admin')->middleware('checkpermission')->name('admin')->group(function () {

//     Route::get('', function () {
//         return View('admin.index');
//     })->name('home_admin');

//     Route::get('/add', function(){
//         return View('admin.index');
//     })->name('add_admin');
// });

Route::group([
    'name' => 'admin',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {
    Route::get('', [HomeController::class, 'index'])->name('admin.home');

    Route::get('/add-user', function () {
        return View('admin.users');
    })->name('admin.add-users');


    
});

Route::prefix('')->group(function () {

    Route::get('', function () {
        return View('client.home');
    })->name('client.home');

    Route::get('buy', function () {
        return View('client.buy');
    })->name('client.buy');

    Route::get('sell', function () {
        return View('client.sell');
    })->name('client.sell');

    Route::get('rent', function () {
        return View('client.rent');
    })->name('client.rent');



});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'checkValidate'])->name('post-login');

