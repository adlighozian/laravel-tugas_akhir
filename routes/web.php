<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\categoryController;
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

// LOGIN START
Route::get('/login', [loginController::class, 'index']);
Route::get('/logout', [loginController::class, 'logout']);
Route::post('/action_login', [loginController::class, 'authenticate']);
// LOGIN END

Route::group(['middleware' => ['user_login']], function () {
    //HOME START
    Route::get('/', [Controller::class, 'index']);
    //HOME END
    // ADMIN START
    Route::get('/admindashboard', [adminController::class, 'index']);
    Route::get('/adminregister', [adminController::class, 'register']);
    Route::get('/manage_user', [adminController::class, 'manage_user']);
    Route::get('/edit_user/{user}', [adminController::class, 'edit_user']);
    Route::post('/action_edit_user/{user}', [adminController::class, 'action_edit_user']);
    // ADMIN END
    // GUDANG START
    Route::get('/gdgdashboard', [gudangController::class, 'index']);
    Route::get('/gdginput', [gudangController::class, 'input']);
    Route::get('/gdghistory', [gudangController::class, 'history']);
    // GUDANG END
    // MENU START
    Route::get('/createmenu', [MenuController::class, 'createmenu']);
    Route::get('/updatemenu', [MenuController::class, 'updatemenu']);
    Route::get('/menueditor', [MenuController::class, 'index']);
    //MENU END
    //CATEGORY START
    Route::get('/categoryeditor', [categoryController::class, 'index']);
    //CATEGORY END 
});
