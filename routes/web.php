<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use \App\Http\Services\UploadService;
use App\Http\Middleware\Authenticate;

// -------- QUẢN TRỊ ---------
Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        // CATEGORY
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category');
            Route::post('changeStatus/{category}', [CategoryController::class, 'changeStatus'])->name('category-status');

            Route::get('/add', [CategoryController::class, 'create'])->name('category-add');
            Route::post('add', [CategoryController::class, 'store']);
            Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('edit/{category}', [CategoryController::class, 'update']);
            Route::delete('delete/{category}', [CategoryController::class, 'delete'])->name('category-delete');
        });
        // PRODUCT
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::post('changeStatus/{product}', [ProductController::class, 'changeStatus'])->name('product-status');

            Route::get('/add', [ProductController::class, 'create'])->name('product-add');
            Route::post('add', [ProductController::class, 'store']);
            Route::get('edit/{product}', [ProductController::class, 'show'])->name('product-edit');
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::delete('delete/{products}', [ProductController::class, 'destroy'])->name('product-delete');

        });

        Route::get('/gallery/add/{product}', [GalleryController::class, 'addGallery'])->name('gallery-add');
    

//          UPLOAD
         Route::post('upload/services',[UploadController::class,'store']);
    });
});






// ------- ĐĂNG NHẬP ------
Route::middleware('guest')->prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/store', [LoginController::class, 'store'])->name('store');
    
});
Route::get('login/logout', [LoginController::class, 'logOut'])->name('logOut');





// ================== TRANG KHACH ==============
Route::prefix('/')->group(function () {
    Route::prefix('/trang-chu')->group(function () {
        Route::get('/',[HomepageController::class,'getCate'] )->name('home-page');
        
    });


    Route::prefix('/san-pham')->group(function () {
        Route::get('/', [ShopController::class,'getProduct'])->name('shop');
        Route::get('/detail/{product}',[ShopController::class,'productDetail'])->name('detail');
    });
    Route::prefix('/danh-muc')->group(function () {
        Route::get('/{category}',[ShopController::class,'getCateDetail'])->name('getCateDetail');
        Route::get('/',[ShopController::class,'getCate'])->name('getCate'); 
        
    });
   



    


    Route::get('/lien-he', function () {
        return view('page.contact');
    })->name('contact');


    Route::get('/gio-hang', function () {
        return view('page.cart');
    })->name('cart');

    // thanh toán
    Route::get('/thanh-toan', function () {
        return view('page.check-out');
    })->name('check-out');

    // đăng ký
    Route::get('/register', function () {
        return view('page.register');
    })->name('register-form');
});
