<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\RemarkController;
use App\Http\Controllers\Admin\RepcommentController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Services\UploadService;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\Authenticate;
use App\Models\Attributes;

// -------- QUẢN TRỊ ---------
Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth.admin'])
        ->prefix('admin')
        ->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin');
            // CATEGORY
            Route::prefix('category')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('category');
                Route::post('changeStatus/{category}', [CategoryController::class, 'changeStatus'])->name('category-status');

                Route::get('/add', [CategoryController::class, 'create'])->name('category-add');
                Route::post('/add', [CategoryController::class, 'store']);

                Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category-edit');
                Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category-update');

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

                Route::delete('delete/{product}', [ProductController::class, 'destroy'])->name('product-delete');
            });
            // quản lý user
            Route::prefix('list-user')->group(function () {
                Route::get('/', [LoginController::class, 'list'])->name('users');
                Route::post('/changeRol/{user}', [LoginController::class, 'changeRol'])->name('admin-role');
                Route::post('/changeStt/{user}', [LoginController::class, 'changeStt'])->name('admin-status');
                Route::get('/edit/{users}', [LoginController::class, 'show'])->name('admin-edit');
                Route::post('/edit/{users}', [LoginController::class, 'update'])->name('admin-update');
                Route::delete('/edit/{users}', [LoginController::class, 'destroy'])->name('admin-delete');
            });
            // Quản lý đơn hàng

            Route::prefix('customer')->group(function () {
                Route::get('/', [CustomerController::class, 'index'])->name('customers');

                Route::post('/changeStt/{customers}', [CustomerController::class, 'cancelOrd'])->name('changeOrdStt');
                Route::post('/DaXuLy/{customers}', [CustomerController::class, 'DaXuLy'])->name('DaXuLy');
                Route::post('/DangVanChuyen/{customers}', [CustomerController::class, 'DangVanChuyen'])->name('DangVanChuyen');
                Route::post('/ThanhCong/{customers}', [CustomerController::class, 'ThanhCong'])->name('ThanhCong');
                Route::post('/HuyDon/{customers}', [CustomerController::class, 'HuyDon'])->name('HuyDon');

                Route::get('/cart/{customers}', [CustomerController::class, 'cartDetail'])->name('customer-cart');
            });

            // ATTRIBUTE
            Route::prefix('attribute')->group(function () {
                Route::get('/', [AttributeController::class, 'index'])->name('att-list');
            });

            Route::prefix('comments')->group(function () {
                Route::get('/', [RemarkController::class, 'index'])->name('cmt');
            });
            //          UPLOAD
        });
});

// ------- ĐĂNG NHẬP ------
Route::middleware('guest')->group(function () {
    Route::middleware(['auth.login'])
        ->prefix('login')
        ->group(function () {
            Route::get('/', [LoginController::class, 'index'])->name('login');
            Route::post('/store', [LoginController::class, 'store'])->name('login-store');
            Route::get('/register', [LoginController::class, 'register'])->name('register-form');
            Route::post('/register', [LoginController::class, 'handleRegister'])->name('register');
        });
});

Route::get('login/logout', [LoginController::class, 'logOut'])->name('logOut');

// ================== TRANG KHACH ==============
Route::prefix('/')
    ->group(function () {
        Route::prefix('/trang-chu')->group(function () {
            Route::get('/', [HomepageController::class, 'getCate'])->name('home-page');
        });

        Route::prefix('/san-pham')->group(function () {
            Route::get('/', [ShopController::class, 'getProduct'])->name('shop');
            Route::get('/detail/{product}', [ShopController::class, 'productDetail'])->name('detail');
            Route::get('/detail', [ShopController::class, 'getProductBottom']);
        });
        Route::prefix('/danh-muc')->group(function () {
            Route::get('/{category}', [ShopController::class, 'getCateDetail'])->name('getCateDetail');
            Route::get('/', [ShopController::class, 'getCate'])->name('getCate');
        });
        Route::prefix('information')->group(function () {
            Route::get('/', [CustomerController::class, 'getUserDetail'])->name('user-detail');
            Route::get('/bill/{customers}', [CustomerController::class, 'billDetail'])->name('billDetail');
        });

        Route::get('/lien-he', function () {
            return view('page.contact');
        })->name('contact');

        Route::post('/comments/{product}', [RemarkController::class, 'comments'])->name('comments');

        Route::post('/repcomments/{remark}',[RepcommentController::class,'rep'])->name('repcmt');
        
        // Gio Hang
        Route::prefix('/gio-hang')->group(function () {
            Route::get('/', [CartController::class, 'showCart'])->name('cart');
            Route::post('/add-cart', [CartController::class, 'addToCart'])->name('add-cart');
            Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update-cart');
            Route::get('/delete/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');
        });

        // thanh toán

        Route::prefix('/thanh-toan')->group(function () {
            Route::get('/', [CheckoutController::class, 'index'])->name('check-out');
            Route::get('/pay', [CheckoutController::class, 'checkout'])->name('checkout');
            Route::post('/addCustomer', [CheckoutController::class, 'addCustomer'])->name('addCustomer');
            Route::post('/order', [CheckoutController::class, 'order'])->name('order');
        });
    });
