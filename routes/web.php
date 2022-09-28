<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\HomeSlideController;

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
// Route::get('/rest')

Route::middleware(['auth'])->group(function (){

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');


    Route::get('admin/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::post('admin/profile/update',[AdminController::class,'updateProfile'])->name('admin.profile.update');


    Route::get('admin/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::post('admin/profile/update',[AdminController::class,'updateProfile'])->name('admin.profile.update');

    Route::get('admin/categories', [CategoryController::class , 'index'])->name('admin.categories');
    Route::post('admin/categories/create', [CategoryController::class , 'create'])->name('admin.categories.create');
    Route::get('admin/categories/show/{id}', [CategoryController::class , 'show'])->name('categories.show');
   
    Route::get('admin/categories/generalList', [CategoryController::class , 'generalList'])->name('admin.categories.generalList');
 
    Route::post('admin/categories/update', [CategoryController::class , 'update'])->name('admin.categories.update');
    Route::post ('admin/categories/changeStatus', [CategoryController::class , 'changeStatus'])->name('admin.categories.changeStatus');

    Route::get('admin/features', [FeatureController::class , 'index'])->name('admin.features');
    Route::post('admin/features/create', [FeatureController::class , 'create'])->name('admin.features.create');
    Route::get('admin/features/show/{id}', [FeatureController::class , 'show'])->name('features.show');
    Route::get('admin/features/generalList', [FeatureController::class , 'generalList'])->name('admin.features.generalList');
    Route::post('admin/features/update', [FeatureController::class , 'update'])->name('admin.features.update');
    Route::post ('admin/features/changeStatus', [FeatureController::class , 'changeStatus'])->name('admin.features.changeStatus');
    
    Route::get('admin/cars', [CarController::class , 'index'])->name('admin.cars');
    Route::post('admin/cars/create', [CarController::class ,'create'])->name('admin.cars.create');
    Route::get('admin/cars/show/{id}', [CarController::class ,'show'])->name('cars.show');
    Route::get('admin/cars/generalList', [CarController::class ,'generalList'])->name('admin.cars.generalList');
    Route::post('admin/cars/update', [CarController::class , 'update'])->name('admin.cars.update');
    Route::post ('admin/cars/changeStatus', [CarController::class , 'changeStatus'])->name('admin.cars.changeStatus');

    Route::get('admin/car_features/show/{id}', [CarController::class ,'getAllFeatures'])->name('car.features.show');
    Route::post('admin/car_features/create', [CarController::class ,'carFeatureCreate'])->name('car.features.create');
    
    Route::get('admin/categories', [CategoryController::class , 'index'])->name('admin.categories');

    Route::get('admin/orders', [OrderController::class , 'index'])->name('admin.orders');
    Route::get('admin/orders/show/{id}', [OrderController::class , 'show'])->name('admin.orders.show');
    Route::get('admin/orders/generalList', [OrderController::class , 'generalList'])->name('admin.orders.generalList');
    Route::get('admin/customers', [CustomersController::class , 'index'])->name('admin.customers');

    // contacts
    Route::get('admin/contacts', [ContactController::class , 'index'])->name('admin.contacts');
    Route::get('admin/contacts/generalList', [ContactController::class ,'generalList'])->name('admin.contacts.generalList');
    Route::get('/admin/contacts/show/{{id}',[ContactController::class, 'show'])->name('admin.contacts.show');

    Route::get('admin/slides', [HomeSlideController::class , 'index'])->name('admin.slides');
    Route::post('admin/slides/update', [HomeSlideController::class , 'update'])->name('admin.slides.update');
    Route::post('admin/slides/create', [HomeSlideController::class , 'create'])->name('admin.slides.create');
    Route::get('admin/slides/generalList', [HomeSlideController::class , 'generalList'])->name('admin.slides.generalList');
    Route::get('admin/slides/show/{id}', [HomeSlideController::class, 'show'])->name('admin.slides.show');
    Route::get('admin/slides/destroy/{id}', [HomeSlideController::class, 'destroy'])->name('admin.slides.destroy');
    
 });

    Route::get('/', [FrontController::class, 'index'])->name('front.home');
    Route::get('about', [FrontController::class, 'about'])->name('front.about');
    Route::get('contact', [FrontController::class, 'contact'])->name('front.contact');
    Route::post('contact/store', [FrontController::class, 'contactStore'])->name('front.contact.store');
    Route::get('cars', [FrontController::class, 'cars'])->name('front.cars');
    Route::get('blogs/', [FrontController::class, 'blogs'])->name('front.blogs');
    Route::get('services', [FrontController::class, 'services'])->name('front.services');
    Route::get('front/car/{id}', [FrontController::class, 'show'])->name('front.car.show');




// reservation 
Route::post('front/reserve/', [FrontController::class, 'reserve'])->name('front.reserve');

Route::get('locale/{language}',[LocalizationController::class,'setLocale'])->name('front.localization');

Route::get('/test', function () {
    return response()->json(['data'=>['1','2','3']]);
});


require __DIR__.'/auth.php';
