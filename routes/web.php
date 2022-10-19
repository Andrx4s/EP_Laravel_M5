<?php

use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\RecordController;
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

        Route::resource('/record', RecordController::class);

//      Промежуточная проверка на роль админа
        Route::middleware('role:Admin')->group(function () {

//          Совместное использование атрибутов маршута
            Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
                Route::resource('/user', UserController::class);
                Route::resource('/cabinets', CabinetController::class);
                Route::resource('/roles', RoleController::class);
                Route::resource('/competencies', CompetenceController::class);
                Route::put('/update/{user}', [UserController::class, 'updateRole'])->name('updateRole');
                Route::put('/competence/{user}', [UserController::class, 'updateCompetence'])->name('updateCompetence');
            });
        });
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
