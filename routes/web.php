<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\BannerController;
use App\Http\Controllers\Shop\ProductController;

use App\Http\Controllers\Shop\ContactController;
use App\Http\Controllers\Shop\PostController;
use App\Http\Controllers\Shop\UserController;
use App\Http\Controllers\AuthController;




use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController ;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\CustomUserController as AdminUserController;

use App\Http\Controllers\Admin\ProductController as AdminProductController ;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\PostController as AdminPostController;







Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('shop.home');
Route::get('/san-pham', [ProductController::class, 'index'])->name('shop.product.products');
Route::get('/danh-muc/{slug}', [ProductController::class, 'ProductByCategory'])->name(name: 'shop.category.categories');
Route::get('/thuong-hieu/{slug}', [ProductController::class, 'ProductByBrand'])->name('shop.brand.brands');
Route::get('/chi-tiet-san-pham/{slug}', [ProductController::class, 'ProductDetail'])->name('shop.detail');
Route::get('/sale-products', [ProductController::class, 'getSaleProducts'])->name('shop.product.productsale');
Route::get('/search', [ProductController::class, 'search'])->name('shop.product.search');


Route::get('/dang-ky', [AuthController::class, 'registration'])->name('shop.registration');
Route::post('/dang-ky', [AuthController::class, 'doRegistration'])->name('shop.doRegistration');

Route::get('/dang-nhap', [AuthController::class, 'login'])->name('shop.login');
Route::post('/dang-nhap', [AuthController::class, 'doLogin'])->name('shop.doLogin');
Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('shop.logout');
Route::get('/tai-khoan', [AuthController::class, 'account'])->name('shop.account');



// admin
// category
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    // Category
    Route::get('/danh-muc', [AdminCategoryController::class, 'index'])->name('admin.category.list');
    Route::get('/them-danh-muc', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/them-danh-muc', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/xem-danh-muc/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/sua-danh-muc/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/sua-danh-muc/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/xoa-tam-danh-muc/{id}', [AdminCategoryController::class, 'trash'])->name('admin.categoryTrash');
    Route::get('/danh-sach-danh-muc-da-xoa', [AdminCategoryController::class, 'trashcountcategory'])->name('admin.category.trash');
    Route::get('/khoi-phuc-danh-muc/{id}', [AdminCategoryController::class, 'restore'])->name('admin.category.restore');
    Route::post('/xoa-danh-muc/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
    Route::delete('/xoa-danh-muc/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('admin/category/update-status/{id}', [AdminCategoryController::class, 'updateStatus'])->name('admin.category.updateStatus');


});
// banner
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    // Banner
    Route::get('/banner', [AdminBannerController::class, 'index'])->name('admin.banner.list');
    Route::get('/them-banner', [AdminBannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/them-banner', [AdminBannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/xem-banner/{id}', [AdminBannerController::class, 'show'])->name('admin.banner.show');
    Route::get('/sua-banner/{id}', [AdminBannerController::class, 'edit'])->name('admin.banner.edit');
    Route::put('/sua-banner/{id}', [AdminBannerController::class, 'update'])->name('admin.banner.update');
    Route::post('/xoa-tam-banner/{id}', [AdminBannerController::class, 'delete'])->name('admin.banner.delete');
    Route::get('/danh-sach-banner-da-xoa', [AdminBannerController::class, 'trashList'])->name('admin.banner.trash');
    Route::get('/khoi-phuc-banner/{id}', [AdminBannerController::class, 'restore'])->name('admin.banner.restore');
    Route::delete('/xoa-banner/{id}', [AdminBannerController::class, 'destroy'])->name('admin.banner.destroy');
    Route::get('admin/banner/update-status/{id}', [AdminBannerController::class, 'updateStatus'])->name('admin.banner.updateStatus');


});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    // Product
    Route::get('/san-pham', [AdminProductController::class, 'index'])->name('admin.product.list');
    Route::get('/them-san-pham', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/them-san-pham', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::get('/xem-san-pham/{id}', [AdminProductController::class, 'show'])->name('admin.product.show');
    Route::get('/sua-san-pham/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/sua-san-pham/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::post('/xoa-tam-san-pham/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
    Route::get('/danh-sach-san-pham-da-xoa', [AdminProductController::class, 'trashList'])->name('admin.product.trash');
    Route::get('/khoi-phuc-san-pham/{id}', [AdminProductController::class, 'restore'])->name('admin.product.restore');
    Route::delete('/xoa-san-pham/{id}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('admin/product/update-status/{id}', [AdminProductController::class, 'updateStatus'])->name('admin.product.updateStatus');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    // Brand
    Route::get('/thuong-hieu', [AdminBrandController::class, 'index'])->name('admin.brand.list');
    Route::get('/them-thuong-hieu', [AdminBrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/them-thuong-hieu', [AdminBrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/xem-thuong-hieu/{id}', [AdminBrandController::class, 'show'])->name('admin.brand.show');

    Route::get('/sua-thuong-hieu/{id}', [AdminBrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('/sua-thuong-hieu/{id}', [AdminBrandController::class, 'update'])->name('admin.brand.update');

    Route::post('/xoa-tam-thuong-hieu/{id}', [AdminBrandController::class, 'delete'])->name('admin.brand.delete');
    Route::get('/danh-sach-thuong-hieu-da-xoa', [AdminBrandController::class, 'trash'])->name('admin.brand.trash');
    Route::get('/khoi-phuc-thuong-hieu/{id}', [AdminBrandController::class, 'restore'])->name('admin.brand.restore');
    Route::delete('/xoa-thuong-hieu/{id}', [AdminBrandController::class, 'destroy'])->name('admin.brand.destroy');
    Route::post('/xoa-thuong-hieu/{id}', [AdminBrandController::class, 'delete'])->name('admin.brand.delete');

    Route::get('/update-status/{id}', [AdminBrandController::class, 'updateStatus'])->name('admin.brand.updateStatus');

});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    // User
    Route::get('/nguoi-dung', [AdminUserController::class, 'index'])->name('admin.custom_user.list');
    Route::get('/them-nguoi-dung', [AdminUserController::class, 'create'])->name('admin.userCreate');
    Route::post('/them-nguoi-dung', [AdminUserController::class, 'store'])->name('admin.userStore');
    Route::get('/sua-nguoi-dung/{id}', [AdminUserController::class, 'edit'])->name('admin.userEdit');
    Route::post('/sua-nguoi-dung/{id}', [AdminUserController::class, 'update'])->name('admin.userUpdate');
    Route::post('/xoa-tam-nguoi-dung/{id}', [AdminUserController::class, 'trash'])->name('admin.userTrash');
    Route::get('/danh-sach-nguoi-dung-da-xoa', [AdminUserController::class, 'trashList'])->name('admin.userTrashList');
    Route::get('/khoi-phuc-nguoi-dung/{id}', [AdminUserController::class, 'restore'])->name('admin.userRestore');
    Route::delete('/xoa-nguoi-dung/{id}', [AdminUserController::class, 'destroy'])->name('admin.userDelete');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    // Contacts
    Route::get('/lien-he', [AdminContactController::class, 'index'])->name('admin.contact.list');
    Route::get('/them-lien-he', [AdminContactController::class, 'create'])->name('admin.contactCreate');
    Route::post('/them-lien-he', [AdminContactController::class, 'store'])->name('admin.contactStore');
    Route::get('/sua-lien-he/{id}', [AdminContactController::class, 'edit'])->name('admin.contactEdit');
    Route::post('/sua-lien-he/{id}', [AdminContactController::class, 'update'])->name('admin.contactUpdate');
    Route::post('/xoa-tam-lien-he/{id}', [AdminContactController::class, 'trash'])->name('admin.contactTrash');
    Route::get('/danh-sach-lien-he-da-xoa', [AdminContactController::class, 'trashList'])->name('admin.contactTrashList');
    Route::get('/khoi-phuc-lien-he/{id}', [AdminContactController::class, 'restore'])->name('admin.contactRestore');
    Route::delete('/xoa-lien-he/{id}', [AdminContactController::class, 'destroy'])->name('admin.contactDelete');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    // Posts
    Route::get('/bai-viet', [AdminPostController::class, 'index'])->name('admin.post.list');
    Route::get('/them-bai-viet', [AdminPostController::class, 'create'])->name('admin.postCreate');
    Route::post('/them-bai-viet', [AdminPostController::class, 'store'])->name('admin.postStore');
    Route::get('/sua-bai-viet/{id}', [AdminPostController::class, 'edit'])->name('admin.postEdit');
    Route::post('/sua-bai-viet/{id}', [AdminPostController::class, 'update'])->name('admin.postUpdate');
    Route::post('/xoa-tam-bai-viet/{id}', [AdminPostController::class, 'trash'])->name('admin.postTrash');
    Route::get('/danh-sach-bai-viet-da-xoa', [AdminPostController::class, 'trashList'])->name('admin.postTrashList');
    Route::get('/khoi-phuc-bai-viet/{id}', [AdminPostController::class, 'restore'])->name('admin.postRestore');
    Route::delete('/xoa-bai-viet/{id}', [AdminPostController::class, 'destroy'])->name('admin.postDelete');
});