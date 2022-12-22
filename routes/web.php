<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientC\CHouseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckPermission;
use App\Http\Controllers\adminC\HousesController;
use App\Http\Controllers\adminC\UsersController;
use App\Http\Controllers\clientC\CNewsController;

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


Route::group([
    'name' => 'admin.',
    'prefix' => 'admin',
    // 'middleware' => 'auth'
], function () {
    Route::get('', [HousesController::class, 'index'])->name('admin.home');

    Route::get('/houses-management',[HousesController::class, 'index'])->name('admin.houses');
    Route::get('/users-management', [UsersController::class, 'index'])->name('admin.users');
    
});

Route::prefix('')->group(function () {

    Route::get('',[CNewsController::class, 'index'])->name('client.home');

    Route::get('sell', [CNewsController::class, 'sellStatus'])->name('client.sell');

    Route::get('rent', function () {
        return View('client.rent');
    })->name('client.rent');

    Route::get('detail/{id}', [CNewsController::class, 'detailNews'])->name('client.detail');

    Route::get('add-news', [CNewsController::class, 'addNews'])->name('client.addNews');
    Route::post('add-news', [CNewsController::class, 'storeNews'])->name('client.storeNews');

    Route::get('my-news', [CNewsController::class, 'myNews'])->name('client.myNews');
    Route::get('editNews/{id}', [CNewsController::class, 'editNews'])->name('client.editNews');

});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'userLogin'])->name('post-login');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'userRegister'])->name('post-register');

Route::get('adminLogout', [LoginController::class, 'adminLogout'])->name('adminLogout');
Route::get('userLogout', [LoginController::class, 'userLogout'])->name('userLogout');

