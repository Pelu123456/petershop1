<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AssignController;
use App\Http\Controllers\Admin\PermissionController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('login');
    
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('login');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/products/{id}', [HomeController::class, 'show'])-> name('show');


// Route::get('/pet-index',[HomeController::class, 'adminProduct'])->name('admin-Product');

Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/update-user/{id}', [UserController::class, 'edit'])->name('edit-user');
        Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('update-user');

Route::get('/product-index', [ProductController::class, 'index'])->name('product-index');
        Route::get('/create-product', [ProductController::class, 'create'])->name('create-product');
        Route::post('/create-product', [ProductController::class, 'store'])->name('store-product');
        Route::get('/update-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::patch('/update-product/{id}', [ProductController::class, 'update'])->name('update-product');
        Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('destroy-product');
        Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');

Route::get('/detail', [ProductDetailController::class, 'index'])->name('detail');
        Route::get('/create-detail', [ProductDetailController::class, 'create'])->name('create-detail');
        Route::post('/create-detail', [ProductDetailController::class, 'store'])->name('store-detail');
        Route::get('/update-detail/{id}', [ProductDetailController::class, 'edit'])->name('edit-detail');
        Route::patch('/update-detail/{id}', [ProductDetailController::class, 'update'])->name('update-detail');
        Route::get('/delete-detail/{id}', [ProductDetailController::class, 'destroy'])->name('destroy-detail');
        Route::delete('/delete-detail/{id}', [ProductDetailController::class, 'delete'])->name('delete-detail');





require __DIR__.'/auth.php';

//Admin
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['web', 'auth', 'role:Admin'])->group(function () {
            
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->middleware(['auth'])->name('dashboard');



Route::get('/role', [RoleController::class, 'index'])->name('role')->middleware(['can:assign.*']);
        Route::get('/create-role', [RoleController::class, 'create'])->name('create-role')->middleware(['can:assign.*']);
        Route::post('/create-role', [RoleController::class, 'store'])->name('store-role')->middleware(['can:assign.*']);
        Route::get('/update-role/{id}', [RoleController::class, 'edit'])->name('edit-role')->middleware(['can:assign.*']);
        Route::patch('/update-role/{id}', [RoleController::class, 'update'])->name('update-role')->middleware(['can:assign.*']);
        Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('destroy-role')->middleware(['can:assign.*']);
        Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role')->middleware(['can:assign.*']);

Route::get('/permission', [PermissionController::class, 'index'])->name('permission')->middleware(['can:assign.*']);
        Route::get('/create-permission', [PermissionController::class, 'create'])->name('create-permission')->middleware(['can:assign.*']);
        Route::post('/create-permission', [PermissionController::class, 'store'])->name('store-permission')->middleware(['can:assign.*']);
        Route::get('/update-permission/{id}', [PermissionController::class, 'edit'])->name('edit-permission')->middleware(['can:assign.*']);
        Route::patch('/update-permission/{id}', [PermissionController::class, 'update'])->name('update-permission')->middleware(['can:assign.*']);
        Route::get('/delete-permission/{id}', [PermissionController::class, 'destroy'])->name('destroy-permission')->middleware(['can:assign.*']);
        Route::delete('/delete-permission/{id}', [PermissionController::class, 'delete'])->name('delete-permission')->middleware(['can:assign.*']);


Route::get('/user-list', [RoleController::class, 'Userindex'])->name('User-list')->middleware(['can:assign.*']);

Route::get('/assign', [AssignController::class, 'rolePermission'])->name('assign')->middleware(['can:assign.*']);

Route::get('/role-assign', [AssignController::class, 'index'])->name('User-role')->middleware(['can:assign.*']);
        Route::get('/insertRole/{id}', [AssignController::class, 'assignRole'])->name('assign-role')->middleware(['can:assign.*']);
        Route::patch('/insertRole/{id}', [AssignController::class, 'insertRole'])->name('insert-role')->middleware(['can:assign.*']);
        Route::get('/delete-role/{id}', [AssignController::class, 'destroy'])->name('destroy-role')->middleware(['can:assign.*']);
        Route::delete('/delete-role/{id}', [AssignController::class, 'delete'])->name('delete-role')->middleware(['can:assign.*']);

Route::get('/permission-assign', [AssignController::class, 'index'])->name('assign-permission')->middleware(['can:assign.*']);
        Route::get('/insertPermission/{id}', [AssignController::class, 'assignPermission'])->name('assign-permission')->middleware(['can:assign.*']);
        Route::patch('/insertPermission/{id}', [AssignController::class, 'insertPermission'])->name('insert-permission')->middleware(['can:assign.*']);
        Route::get('/delete-permission/{id}', [AssignController::class, 'destroy'])->name('destroy-permission')->middleware(['can:assign.*']);
        Route::delete('/delete-permission/{id}', [AssignController::class, 'delete'])->name('delete-permission')->middleware(['can:assign.*']);
});
