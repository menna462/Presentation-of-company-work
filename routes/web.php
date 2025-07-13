<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompletionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ImgproductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamworkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
 Route::get('/user/cv', [BackendController::class, 'index'])->name('usercv');

Route::get('/user', [UserController::class, 'index'])->name('users');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/backend/imgproduct', [ImgproductController::class, 'index'])->name('imgproduct');


Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');



Route::get('/service/show/{id}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/service/update', [ServiceController::class, 'update'])->name('service.update');



Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');


Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/imgproduct/delete/{id}', [ImgproductController::class, 'destroy'])->name('imgproduct.delete');
    Route::get('/imgproduct/create', [ImgproductController::class, 'create'])->name('imgproduct.create');
    Route::post('/imgproduct/store', [ImgproductController::class, 'store'])->name('imgproduct.store');
    Route::get('/imgproduct/edit/{id}', [ImgproductController::class, 'edit'])->name('imgproduct.edit');
    Route::post('/imgproduct/update', [ImgproductController::class, 'update'])->name('imgproduct.update');

    });


Route::get('/', [frontendController::class, 'index'])->name('home');
 Route::post('/user/logout', [BackendController::class, 'userLogout'])->name('user.logout');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/all-services', [FrontendController::class, 'allServices'])->name('allServices');
Route::get('/products', [FrontendController::class, 'allProducts'])->name('allProducts');
Route::get('/product/{id}', [FrontendController::class, 'showProduct'])->name('productshow');

require __DIR__ . '/auth.php';
