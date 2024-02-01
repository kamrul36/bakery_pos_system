<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;




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
Route::get('/invoicePage',[InvoiceController::class,'InvoicePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);




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

Route::get("/summary",[DashboardController::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/sales-report/{FormDate}/{ToDate}",[ReportController::class,'SalesReport'])->middleware([TokenVerificationMiddleware::class]);



