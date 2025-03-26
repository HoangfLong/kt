<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HocPhanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhVienController;

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
    return redirect()->route('sinhvien.index');
});

Route::resource('sinhviens', SinhVienController::class);

Route::get('/hocphan', [HocPhanController::class, 'index'])->name('hocphan.index');
Route::get('/hocphan/dangky/{maHP}', [HocPhanController::class, 'dangKy'])->name('hocphan.dangky');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
