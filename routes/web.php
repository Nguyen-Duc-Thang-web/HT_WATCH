<?php

use App\Models\Bill;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\billController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\khuyenmaiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [clientController::class, 'index'])->name('trangchu');

// Điều hướng client
Route::get('cuahang', [clientController::class, 'cuaHang'])->name('cuahang');
Route::get('chitiet/{id}', [clientController::class, 'chitiet'])->name('chitiet');
Route::get('giohang', [clientController::class, 'giohang'])->name('giohang');
Route::get('giohang', [clientController::class, 'magiamgia'])->name('giohang');
Route::post('themgiohang', [clientController::class, 'themgiohang'])->name('themgiohang');
Route::post('/bills/{id}/cancel', [clientController::class, 'cancel'])->name('bills.cancel');
Route::get('giohang', [clientController::class, 'magiamgia'])->name('giohang');
Route::get('/send-order-details', [clientController::class, 'sendOrderDetails'])->name('send.order.details');

Route::put('/bills/updateStatus/{id}', [BillController::class, 'updateStatus'])->name('bills.updateStatus');
Route::get('xoagiohang/{id}', [clientController::class, 'xoagiohang'])->name('xoagiohang');
Route::post('hoadon', [clientController::class, 'hoadon'])->name('hoadon');
Route::get('hoadon', [clientController::class, 'layhoadon'])->name('layhoadon');
Route::post('thanhtoan', [clientController::class, 'thanhtoan'])->name('thanhtoan');
Route::post('pay', [clientController::class, 'pay'])->name('pay');
Route::get('lienhe', [clientController::class, 'lienhe'])->name('lienhe');
Route::get('gioithieu', [clientController::class, 'gioithieu'])->name('gioithieu');
Route::get('hoso', [clientController::class, 'hoso'])->name('hoso');
Route::get('camon', [clientController::class, 'camon'])->name('camon');
Route::get('donhang_all', [clientController::class, 'donhang_all'])->name('donhang_all');
// điều hướng admin
Route::get('admin', [adminController::class, 'index'])->name('admin_index');

//resource admin
Route::resource('watchs', WatchController::class);
Route::resource('categorys', categoryController::class);
Route::resource('banners', bannerController::class);
Route::resource('bills', billController::class);
Route::resource('khuyenmais', khuyenmaiController::class);
Route::get('users/list', [adminController::class, 'indexUser'])->name('list');


// Route::put('/bills/updateStatus/{id}', [BillController::class, 'updateStatus'])->name('bills.updateStatus');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'check.type:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('watchs', WatchController::class);
    Route::resource('categorys', categoryController::class);
    Route::resource('banners', bannerController::class);
    Route::resource('bills', billController::class);
    Route::resource('khuyenmais', khuyenmaiController::class);

});
Route::group(
    ['middleware' => ['auth', 'check.login']],
    function () {
        Route::get('giohang', [clientController::class, 'giohang'])->name('giohang');
        Route::post('themgiohang', [clientController::class, 'themgiohang'])->name('themgiohang');
        Route::get('xoagiohang/{id}', [clientController::class, 'xoagiohang'])->name('xoagiohang');
        Route::post('hoadon', [clientController::class, 'hoadon'])->name('hoadon');
        Route::get('hoadon', [clientController::class, 'layhoadon'])->name('layhoadon');
        Route::post('thanhtoan', [clientController::class, 'thanhtoan'])->name('thanhtoan');
        Route::get('camon', [clientController::class, 'camon'])->name('camon');
        Route::get('donhang', [clientController::class, 'donhang'])->name('donhang');
    }
);
