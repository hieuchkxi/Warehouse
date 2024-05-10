<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

route::group(['prefix' => ''], function () {
    route::get('/', [HomeController::class, 'index'])->name('admin.index');
});
route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
route::post('/admin/login', [AdminController::class, 'check_login']);
route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    route::get('/', [AdminController::class, 'index'])->name('admin.index');
});
