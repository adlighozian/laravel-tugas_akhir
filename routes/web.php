<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\TransactionController;

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
    // KEUANGAN START
    Route::get('/kudashboard', [TransactionController::class, 'dashboard']);
    Route::get('/kumonthindexin/{month_year}', [TransactionController::class, 'monthindexin']);
    Route::get('/kumonthindexout/{month_year}', [TransactionController::class, 'monthindexout']);
    Route::get('/kudayindexin/{date}', [TransactionController::class, 'dayindexin']);
    Route::get('/kudayindexout/{date}', [TransactionController::class, 'dayindexout']);
    Route::post('/kusearch', [TransactionController::class, 'kusearch']);
    Route::get('/kutransaction', [TransactionController::class, 'index']);
    Route::get('/kuinput', [TransactionController::class, 'input']);
    Route::post('/kuinput/store', [TransactionController::class, 'store']);
    Route::get('/kuview/{transaction}', [TransactionController::class, 'view']);
    Route::get('/edit_user/{user}', [adminController::class, 'edit_user']);
    Route::post('/action_edit_user/{user}', [adminController::class, 'action_edit_user']);
    // KEUANGAN END
    // GUDANG START
    Route::get('/gdgdashboard', [gudangController::class, 'dashboard']);
    Route::get('/gdgdetail/{id}', [gudangController::class, 'detailBarang']);
    Route::get('/gdginput', [gudangController::class, 'input']);
    Route::get('/gdghistory', [gudangController::class, 'history']);
    Route::get('/gdghistory/detail/{date}', [gudangController::class, 'historyDetail']);
    Route::get('/gdginputkode', [gudangController::class, 'inputKode']);
    Route::post('/gdgdetail/masuk', [gudangController::class, 'masukBarang']);
    Route::post('/gdgdetail/keluar', [gudangController::class, 'keluarBarang']);
    Route::post('/gdgdashboard/delete', [gudangController::class, 'deleteBarang']);
    Route::post('/gdginputkode/delete', [gudangController::class, 'deleteKode']);
    Route::post('/gdginputkode', [gudangController::class, 'storeKode']);
    Route::post('/gdginput', [gudangController::class, 'storeBarang']);
    // GUDANG END
    // MENU START
    Route::get('/createmenu', [MenuController::class, 'createmenu']);
    Route::get('/updatemenu', [MenuController::class, 'updatemenu']);
    Route::get('/menueditor', [MenuController::class, 'index']);
    Route::get('/updatemenu/edit/{menu}', [MenuController::class, 'edit']);
    Route::get('/menueditor/hapus/{id}', [MenuController::class, 'hapus']);
    Route::post('/createmenu/store', [MenuController::class, 'store']);
    Route::post('/updatemenu/edit/{menu}/update', [MenuController::class, 'update']);
    Route::get('/menueditor/{id}/hide', [MenuController::class, 'hidemenu']);
    Route::get('/menueditor/{id}/unhide', [MenuController::class, 'unhidemenu']);

    //MENU END
    //CATEGORY START
    Route::get('/categoryeditor', [categoryController::class, 'index']);
    Route::post('/categoryeditor/store', [categoryController::class, 'store']);
    Route::get('/categoryeditor/hapus/{id}', [categoryController::class, 'hapus']);
    //CATEGORY END
    //ORDER START
    Route::get('/pemesanan', [orderController::class, 'index']);
    Route::get('/pemesanan/{table}', [orderController::class, 'indext']);
    Route::get('/confirmOrder/{table}', [orderController::class, 'confirmOrder'])->name('confirmOrder');
    // Route::get('/pemesanan/confirmation', [orderController::class, 'confirmationOrder']);
    Route::post('/checkRequest', [orderController::class, 'checkRequest']);
    Route::get('/deleteOrder/{table}', [orderController::class, 'deleteOrder']);
    //ORDER END
    //PAYMENT START
    Route::get('/listpayment', [paymentController::class, 'index']);
    Route::get('/listpayment/detailpayment/{table}', [paymentController::class, 'detailPayment']);
    Route::post('/listpayment/actionpayment', [paymentController::class, 'actionPayment']);
    //PAYMENT END
    //KITCHEN NOTE START
    Route::get('/kitchenote', [orderController::class, 'kitchenNote']);
    Route::get('/kitchenDone/{order}', [orderController::class, 'kitchenDone']);
    // KITCHEN NOTE END
});
