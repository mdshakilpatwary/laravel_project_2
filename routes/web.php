<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminUserController;
use App\Http\Controllers\Backend\Admin\AddProductController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\SubCatController;
use App\Http\Controllers\Backend\Vendor\VendorUserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin route start .............

Route::middleware('auth','role:admin')->group(function () {
    Route::controller(AdminUserController::class)->group(function () {
        Route::get('admin/dashboard', 'index')->name('admin.dashboard');
        Route::get('admin/logout', 'logout')->name('admin.logout');
        Route::get('admin/profile', 'profile')->name('admin.profile');
        Route::post('admin/update/profile/{id}', 'profileUpdate')->name('admin.update.profile');
        Route::get('admin/changePass/profile/{id}', 'changePass')->name('admin.changePass.profile');
        Route::post('admin/changePassUpdate/profile/{id}', 'UpdatePass')->name('admin.updatePass.profile');
    });
    Route::controller(AddProductController::class)->group(function () {
        Route::get('admin/product', 'index')->name('admin.product.page');
        Route::post('admin/product/add', 'store')->name('admin.product.add');
        Route::get('admin/product/manage', 'manage')->name('admin.product.manage');
        Route::get('admin/product/delete/{id}', 'productDelete')->name('admin.product.delete');
        Route::get('admin/product/edit/{id}', 'editProduct')->name('admin.product.edit');
        Route::post('admin/product/update/{id}', 'updateProduct')->name('admin.product.update');
        Route::get('admin/product/status/{id}', 'productstatus')->name('admin.product.status');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('admin/category', 'index')->name('admin.category.page');
        Route::post('admin/category/add', 'store')->name('admin.category.add');
        Route::get('admin/category/manage', 'manage')->name('admin.category.manage');
        Route::get('admin/category/delete/{id}', 'catDelete')->name('admin.category.delete');
        Route::get('admin/category/edit/{id}', 'catEdit')->name('admin.category.edit');
        Route::post('admin/category/update/{id}', 'catUpdate')->name('admin.category.update');

    });
    Route::controller(SubCatController::class)->group(function () {
        Route::get('admin/subcategory', 'index')->name('admin.subcategory.page');
        Route::post('admin/subcategory/add', 'store')->name('admin.subcategory.add');
        Route::get('admin/subcategory/manage', 'manage')->name('admin.subcategory.manage');
        Route::get('admin/subcategory/delete/{id}', 'subcatDelete')->name('admin.subcategory.delete');
        Route::get('admin/subcategory/edit/{id}', 'subcatEdit')->name('admin.subcategory.edit');
        Route::post('admin/subcategory/update/{id}', 'subcatUpdate')->name('admin.subcategory.update');

    });
});


Route::middleware('guest')->group(function(){
    Route::get('/admin/login',[AdminUserController::class, 'adminLogin'])->name('admin.login');

});

// vendor route start ..................

Route::middleware('auth','role:vendor')->group(function () {
    Route::controller(VendorUserController::class)->group(function () {
        Route::get('vendor/dashboard', 'index')->name('vendor.dashboard');
    
    });
});












require __DIR__.'/auth.php';
