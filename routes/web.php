<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Categroy Routes
    Route::any('category/create', [CategoryController::class, 'createCategory'])->name('createCategory');

    Route::get('categories', [CategoryController::class, 'allCategories'])->name('allCategories');

    Route::any('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');

    Route::delete('categories/delete/{category_id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    //Products routes
    Route::get('products', [ProductController::class, 'allProducts'])->name('allProducts');

    Route::any('product/create', [ProductController::class, 'createProduct'])->name('createProduct');

    Route::get('product/delete/{product_id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

    Route::any('product/edit/{id}', [ProductController::class, 'editProduct'])->name('editProduct');

    //Image upload routes
    Route::post('product-images/{product_id}', [ProductImageController::class, 'store'])->name('images.store');
    Route::post('product-image/remove/{product_id}', [ProductImageController::class, 'remvoeFile'])->name('image.remove');


});

require __DIR__.'/auth.php';
