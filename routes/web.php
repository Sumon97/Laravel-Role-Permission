<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resources([
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
    ]);

    Route::get('user/list', [UserController::class, 'list'])->name('user.list');
    Route::get('user/{user}/', [UserController::class, 'userShow'])->name('user.show');
     Route::post('user/{user}', [UserController::class, 'userUpdate'])->name('user.update');

});




Route::middleware(['role:admin'])->group(function () {


    Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home');


});


Route::middleware(['role:superadmin'])->group(function () {


    Route::get('superadmin/home', [SuperAdminController::class, 'index'])->name('super.home');


});



