<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
})->name('welcome');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost']);

// Промежуточная проверка автризации
Route::middleware('auth')->group(function() {

//  Промежуточная проверка ролей авторизованных аккаунтов
    Route::middleware('role:Patient,Admin,Doctor')->group(function () {

//      Промежуточная проверка на роль админа
        Route::middleware('role:Admin')->group(function () {

//          Совместное использование атрибутов маршута
            Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
                Route::resource('/user', UserController::class);
                Route::resource('/roles', RoleController::class);
            });
        });
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
