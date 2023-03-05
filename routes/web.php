<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ManagementController;


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

// お問い合わせ情報の登録
Route::get('/', [InquiryController::class, 'index']);
Route::post('/check', [InquiryController::class,'check']);
Route::post('/correction', [InquiryController::class, 'correction']);
Route::post('/store', [InquiryController::class, 'store']);

// 管理システム
Route::get('/management', [ManagementController::class, 'management']);
Route::get('/search', [ManagementController::class, 'search']);
Route::post('/delete', [ManagementController::class, 'delete']);


// 画面遷移用　最後に消す
Route::get('/checkInfo', [InquiryController::class, 'checkInfo']);
Route::get('/thanks', [InquiryController::class, 'thanks']);
