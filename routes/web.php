<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\UserController;
use App\Http\Controllers\admins\DanhMucController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\ChucVuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', [SanPhamController::class, 'index']);
Route::get('/danhmuc', [DanhMucController::class, 'index'])->name('admin.danhmuc');
Route::resource('user', UserController::class);
Route::resource('chucvu', ChucVuController::class);
