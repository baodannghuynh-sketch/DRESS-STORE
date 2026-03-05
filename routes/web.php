<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// User
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;



// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (KHÔNG CẦN LOGIN)
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [ProductController::class, 'homepage']);
Route::get('/contact', function () {
    return view('contact.index');
});


Route::post('/profile/update', function (\Illuminate\Http\Request $request) {
    $user = session('user');

    \DB::table('users')
        ->where('id', $user->id)
        ->update(['name' => $request->name]);

    $user->name = $request->name;
    session(['user' => $user]);

    return redirect('/profile')->with('success', 'Updated!');
});
Route::get('/profile', function () {
    if (!session('user')) {
        return redirect('/login');
    }
    return view('profile.index');
});



// Auth
Route::get('/login',    [LoginController::class, 'showLogin'])->name('login');
Route::post('/login',   [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);

Route::get('/logout',   [LoginController::class, 'logout'])->name('logout');

// Sản phẩm
Route::get('/product', [UserProductController::class, 'index'])->name('products.index');
Route::get('/product/{slug}', [UserProductController::class, 'detail'])->name('products.detail');
Route::get('/admin/products/disable/{id}',[ProductController::class, 'disable'])->name('admin.products.disable');
Route::get('/search', [ProductController::class, 'search'])->name('search');


// Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');



// Checkout (phải login)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/orders', [OrderController::class, 'myOrders'])->name('orders.mine');
});

/*
|--------------------------------------------------------------------------
| USER ROUTES (ĐÃ LOGIN)
|--------------------------------------------------------------------------
| GẮN middleware AuthCheck sau (đã có sẵn trong cấu trúc)
*/

Route::middleware(['auth.check'])->group(function () {

    Route::get('/cart', function () {
        return 'Giỏ hàng';
    });

    // Giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
     // Trang checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout');

    // Xử lý đặt hàng
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place');

    // Đơn hàng (lịch sử)
    Route::get('/orders', [CheckoutController::class, 'history'])
    ->middleware('auth.check')
    ->name('orders.history');


    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
| /admin/*
| GẮN middleware IsAdmin sau (đã có sẵn trong cấu trúc)
*/

Route::prefix('admin')
    ->middleware(['auth.check', 'is.admin'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.users');

    /*
    |--------------------------------------------------------------------------
    | ADMIN - PRODUCTS
    |--------------------------------------------------------------------------
    */
    Route::get('/products', [AdminProductController::class, 'index'])
        ->name('admin.products.index');

    Route::get('/products/create', [AdminProductController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/products/store', [AdminProductController::class, 'store'])
        ->name('admin.products.store');

    Route::get('/products/edit/{id}', [AdminProductController::class, 'edit'])
        ->name('admin.products.edit');

    Route::post('/products/update/{id}', [AdminProductController::class, 'update'])
        ->name('admin.products.update');

    Route::get('/products/delete/{id}', [AdminProductController::class, 'delete'])
        ->name('admin.products.delete');
        //USERS
    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/users/toggle-admin/{id}', [UserController::class, 'toggleAdmin'])
        ->name('admin.users.toggleAdmin');

    /*
    |--------------------------------------------------------------------------
    | ADMIN - ORDERS
    |--------------------------------------------------------------------------
    */
    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders.index');

    Route::get('/orders/{id}', [AdminOrderController::class, 'detail'])
        ->name('admin.orders.detail');

    Route::post('/orders/update-status/{id}', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');

});
