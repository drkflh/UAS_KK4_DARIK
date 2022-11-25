<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/mobil/{id}', [MobilController::class, 'show']);
Route::get('/mobil', [MobilController::class, 'index']);



Route::middleware('auth:sanctum')->group(function (){
    Route::resource('/transaksi', TransaksiController::class)->except('edit','show','index','delete')->middleware('admin');
    Route::resource('/mobil', MobilController::class)->except('edit','store','delete')->middleware('admin');
    Route::get('/mobil/{id}', [MobilController::class, 'show']);
    Route::get('/mobil', [MobilController::class, 'index']);
    Route::post('/mobil', [MobilController::class, 'store']);
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);


});
