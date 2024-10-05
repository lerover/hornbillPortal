<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Employer;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Start Auth Route

//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

//Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Employer Register
Route::get('/register/employer', [RegisterController::class, 'employerRegister'])->name('register.employer');
Route::post('/register/employer', [RegisterController::class, 'employerRegisterPost'])->name('register.employer.post');

// Employer Register
Route::get('/register/employee', [RegisterController::class, 'employeeRegister'])->name('register.employer');
Route::post('/register/employee', [RegisterController::class, 'employeeRegisterPost'])->name('register.employer.post');

//End Auth Route

Route::get('newsfeed/profile',[ProfileController::class,'index'])->name('profile');
Route::post('newsfeed/profile/{id}/delete',[ProfileController::class,'delete'])->name('profile.delete');
//Dashboard

// Search
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/newsfeed/home',[\App\Http\Controllers\NewsfeedController::class,'index'])->name('newsfeed.home');

Route::middleware(['auth'])->group(function () {
    //Job application
    Route::post('/newsfeed/jobapply/{id}',[\App\Http\Controllers\JobapplyController::class,'store'])->name('newsfeed.store');

    // Admin
    Route::get('/admin/index', [Admin\ApplicationController::class, 'index'])->name('admin.index');
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/users', UserController::class);
    Route::get('admin/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::post('admin/payments/{id}/update',[PaymentController::class, 'update'])->name('admin.payments.update');
    Route::post('admin/payments/search',[PaymentController::class, 'search'])->name('admin.payments.search');
    Route::post('admin/users/search',[Admin\UsersearchController::class, 'search'])->name('admin.users.search');
    Route::get('admin/posts',[Admin\PostController::class, 'index'])->name('admin.posts.index');
    Route::get('admin/posts/postdetails/{id}',[Admin\PostDetailController::class, 'index'])->name('admin.postdetail.index');
    Route::post('admin/posts/postdetails/{id}/show_hide',[Admin\PostDetailController::class, 'update'])->name('admin.postdetail.update');
});

Route::middleware(['auth','employerAuth'])->group(function () {
// Employer
Route::get('/employer/index', [Employer\ApplicationController::class, 'index'])->name('employer.index');
Route::resource('/employer/post',Employer\PostController::class);
Route::post('/employer/post/search', [Employer\SearchController::class, 'search'])->name('employer.post.search');
Route::resource('/employer/category', Employer\CategoryController::class);
Route::get('/employer/application', [Employer\ApplicationController::class, 'index'])->name('employer.application.index');
Route::post('/employer/application/reply/{application}', [Employer\ApplicationController::class, 'update'])->name('employer.application.update');
Route::delete('/employer/application/{application}/delete',[Employer\ApplicationController::class, 'destroy'])->name('employer.application.destroy');
Route::get('employer/payment',[Employer\PaymentController::class,'index'])->name('employer.payment.index');
Route::post('employer/payment',[Employer\PaymentController::class,'store'])->name('employer.payment.store');
Route::post('employer/interviewinfo/{applicationId}',[Employer\InterviewInfoController::class,'store'])->name('employer.interviewinfo.store');
});
