<?php

use App\Models\DanhMuc;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\UserController;
use App\Http\Controllers\admins\DanhMucController;
use App\Http\Controllers\admins\SanPhamController;
use App\Http\Controllers\admins\BinhLuanController;
use App\Http\Controllers\admins\ChucVuController;
use App\Http\Controllers\auth\AuthController;

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
Route::middleware('admin')->group(function () {
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('sanpham', SanPhamController::class);
    Route::resource('user', UserController::class);
    Route::resource('binhluan', BinhLuanController::class);
    Route::resource('chucvu', ChucVuController::class);
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('sanpham', SanPhamController::class);
    Route::resource('user', UserController::class);
    Route::resource('binhluan', BinhLuanController::class);
    Route::resource('chucvu', ChucVuController::class);
});


// Auth
Route::group([], function () {
    Route::get('login', [AuthController::class, 'showFormLogin'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'showFormRegister'])->name('register.form');
    Route::post('register', [AuthController::class, 'Register'])->name('register');
    Route::get('sendEmail', [AuthController::class, 'showFormSendMail'])->name('sendEmail.form');
    Route::post('sendEmail', [AuthController::class, 'SendMail'])->name('sendEmail');
    Route::get('resetPassword/{token}', [AuthController::class, 'showFormResetPassword'])->name('password.reset');
    Route::post('resetPassword', [AuthController::class, 'ResetPassword'])->name('password.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
