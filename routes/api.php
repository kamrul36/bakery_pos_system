<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogIn']);
Route::post('/send-otp', [UserController::class, 'SendOtpCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOtp']);
Route::post('/reset-password', [UserController::class, 'ResetPass'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);




Route::get('/logout', [UserController::class, 'UserLogOut']);

Route::get('/',[HomeController::class,'HomePage']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]) ;
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]) ;
Route::get('/categoryPage',[CategoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/productPage',[ProductController::class,'ProductPage'])->middleware([TokenVerificationMiddleware::class]);

// category api
Route::post('/create-category',[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::get('/category-list',[CategoryController::class,'CategoryList'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/delete-category',[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/category-update',[CategoryController::class,'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/category-by-id',[CategoryController::class,'CategoryById'])->middleware([TokenVerificationMiddleware::class]) ;

//customer api
Route::post('/create-customer',[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::get('/customer-list',[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/delete-customer',[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/update-customer',[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/customer-by-id',[CustomerController::class,'CustomerById'])->middleware([TokenVerificationMiddleware::class]) ;


//Product api
Route::post('/create-product',[ProductController::class,'ProductCreate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::get('/product-list',[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/delete-product',[ProductController::class,'ProductDelete'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/update-product',[ProductController::class,'ProductUpdate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/product-by-id',[ProductController::class,'ProductById'])->middleware([TokenVerificationMiddleware::class]) ;


//Invoice api
Route::post('/create-invoice',[InvoiceController::class,'InvoiceCreate'])->middleware([TokenVerificationMiddleware::class]) ;
Route::get('/invoice-list',[InvoiceController::class,'InvoiceSelect'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/invoice-details',[InvoiceController::class,'InvoiceDetails'])->middleware([TokenVerificationMiddleware::class]) ;
Route::post('/invoice-delete',[InvoiceController::class,'InvoiceDelete'])->middleware([TokenVerificationMiddleware::class]) ;