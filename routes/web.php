<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Redirect;


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




route::get('login', [LoginController::class, 'index']);
route::get('dash', [LoginController::class, 'show']);
route::get('user', [LoginController::class, 'usershow']);




// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return Redirect::route('admin.login');
    });

    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('admin.login');


    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/userdata', [AdminController::class, 'userdata'])->name('userdata');
        Route::post('/userdata', [AdminController::class, 'userstore'])->name('userdata.store');
        route::get('userdata/{id}', [AdminController::class, 'view'])->name('view');
        route::get('newview/{id}', [AdminController::class, 'newview'])->name('newview');
        route::get('newedit/{id}', [AdminController::class, 'edit'])->name('newedit');
        Route::post('newupdate/{id}', [AdminController::class, 'newupdate'])->name('newupdate');
        route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
     
        route::get('main', [AdminController::class, 'newheader']);
        route::get('user', [AdminController::class, 'user']);
        route::get('result', [AdminController::class, 'result']);
        route::get('profile', [AdminController::class, 'profile']);
        Route::get('/header', [AdminController::class, 'header'])->name('admin.header');
        Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('change-password');
Route::post('/change-password', [AdminController::class, 'changePassword'])->name('change.password');
    });
});


