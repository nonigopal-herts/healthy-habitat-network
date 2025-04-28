<?php
//Auth Controllers

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductServiceCategoryController;
use App\Http\Controllers\Admin\ProductServiceSubcategoryController;
use App\Http\Controllers\Admin\ProductServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Admin\BusinessController;
use Illuminate\Support\Facades\Route;

//Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsServicesController;
use App\Http\Controllers\Frontend\ResidentAuthController;

use App\Http\Controllers\Frontend\ProductServiceVoteController;


//Auth::routes();
// Resident Authentication

Route::prefix('resident')->group(function() {
    Route::get('/login', [ResidentAuthController::class, 'showLoginForm'])->name('resident.login');
    Route::post('/login', [ResidentAuthController::class, 'login']);
    Route::post('/logout', [ResidentAuthController::class, 'logout'])->name('resident.logout');
});


// Authentication Routes
Route::middleware('guest')->group(function () {
    // Registration
    Route::get('/registration', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/registration', [RegisterController::class, 'register']);

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    //End of Registration

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/service-subcategory/{id}', [HomeController::class, 'serviceSubcategories'])->name('service-subcategory');
    Route::get('/product-subcategory/{id}', [HomeController::class, 'productSubcategories'])->name('product-subcategory');
    Route::get('/services/{id}', [HomeController::class, 'services'])->name('services');
    //Route::get('/products-services/{id}', [HomeController::class, 'productServices'])->name('products-services');
    Route::get('products-services/{id?}', [HomeController::class, 'productServices'])->name('products-services');

    Route::get('/products-services-details/{id}', [HomeController::class, 'productsServicesDetails'])->name('products-services-details');
    Route::post('/products/{product}/vote', [ProductServiceVoteController::class, 'vote'])->name('products.vote');



//    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
//    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
});

// Protected Routes
//Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Category Routes
    Route::resource('/categories', CategoryController::class);
    Route::resource('/areas', AreaController::class);

    Route::resource('/productservicecategories', ProductServiceCategoryController::class);
    // Product Subcategories Resource Route
    Route::resource('product-subcategories', ProductServiceSubcategoryController::class)
        ->parameters(['product-subcategories' => 'productSubcategory'])
        ->names('product-subcategories');

    Route::resource('product-services', ProductServiceController::class)
        ->parameters(['product-services' => 'productService'])
        ->names('product-services');

    Route::resource('businesses', BusinessController::class);

});



//Route::prefix('admin')->name('admin.')->group(function () {
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Category Routes
//Route::resource('/categories', CategoryController::class);

// Area Routes
//Route::resource('/areas', AreaController::class);
        // Add more admin routes here
    //});
//});


