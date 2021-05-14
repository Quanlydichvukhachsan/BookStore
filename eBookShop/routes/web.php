<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthorController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');



Auth::routes();

Route::middleware(['auth'])->group(function () {
//admin
    Route::resource('admin',Controllers\AdminController::class);

    Route::resource('category',Controllers\CategoryController::class);
    Route::resource('product', ProductController::class);

});

Route::middleware(['auth'])->group(function () {


//product


//user
    Route::resource('user',UserController::class);

//role
    Route::resource('role',RoleController::class);


//permission
    Route::resource('permission',PermissionController::class);
//Add-Role-user
 Route::get('/user/{user}/role',[UserController::class, 'editRole'])->name('user.role');
 Route::post('/user/{user}/addRole',[UserController::class, 'addRole'])->name('user.addRole');


//order
  Route::resource('order',OrderController::class);
    Route::delete('/order/{id}/customer/{idCustomer}/delete',[OrderController::class, 'orderDelete'])->name('order.orderDelete');
    Route::get('/order/{id}/customer/{idCustomer}/show',[OrderController::class, 'orderShow'])->name('order.orderShow');
    Route::post('/category/getCategory',[CategoryController::class, 'getCategory'])->name('category.getCategory');
    Route::post('/category/getCategory',[CategoryController::class, 'displayCategory'])->name('category.displayCategory');

    Route::resource('author',AuthorController::class);

    Route::resource('book',BookController::class);

    Route::post('/book/site/{id}/file-delete',[BookController::class, 'deleteImage'])->name('book.deleteImage');
    Route::get('/book/{id}/discount',[BookController::class, 'discountBook'])->name('book.discount');
    Route::post('/book/{id}/discount/update',[BookController::class, 'updateDiscountBook'])->name('book.UpdateDiscount');
    Route::resource('publisher',Controllers\PublisherController::class);
});
