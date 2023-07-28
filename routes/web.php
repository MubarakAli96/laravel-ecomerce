<?php

use App\Http\Controllers\admin\ActiveUserController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\vendor\VendorController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\vendor\VendorProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

///////////////////////frontend pages////////////////////////////////////////////////////////

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index.home');
Route::get('/contact', [\App\Http\Controllers\Contactcontroller::class, 'index'])->name('contact');
Route::post('/contact/store', [\App\Http\Controllers\Contactcontroller::class, 'store'])->name('contact.store');
Route::get('/product/details/{id}/{slug}', [\App\Http\Controllers\IndexController::class, 'product_details']);
Route::get('/product/category/{id}/{slug}', [\App\Http\Controllers\IndexController::class, 'catewsise_product'])->name('category.details');
Route::get('/product/subcategory/{id}/{slug}', [\App\Http\Controllers\IndexController::class, 'subcate_wise_product'])->name('Subcategory.details');
Route::get('/register', [\App\Http\Controllers\BecomeVendorController::class, 'index'])->name('become_vendor');
Route::post('/register/store', [\App\Http\Controllers\BecomeVendorController::class, 'StoreVEndor'])->name('become_vendor.store');


////////////////////////////////// admin and vendor  routes ////////////////////////////////////////////////////////
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {

        Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
        Route::get('/admin/logout', 'destroy')->name('admin.logout');

        //user profile
        Route::get('user/profile', 'UserProfile')->name('admin.profile');
        Route::post('admin/profile/store', 'StorePofile')->name('admin.profile.store');
        Route::get('admin/change-password', 'changePassword')->name('admin.change.password');
        Route::post('admin/update-password', 'UpdateAdminPass')->name('update.admmin.password');

        //contact
        Route::get('/contact/all', 'contactsDisplay')->name('all.contacts');
        //front page silder
        Route::get('/admin/slider', 'frontPageSilder')->name('all.slider');
        Route::get('/admin/slider/create', 'createPageSlider')->name('sliderAll');
        Route::post('/admin/slider/store', 'storeSilder')->name('slider.store');

        //front page silder
        Route::get('/admin/banner', 'frontPageBanner')->name('all.banner');
        Route::get('/admin/banner/create', 'createPageBanner')->name('add.banner');
        Route::post('/admin/banner/store', 'storeBanner')->name('banner.store');

        //brands
        Route::controller(BrandController::class)
            ->prefix('brand')->group(function () {
                Route::get('/', 'index')->name('brand');
                Route::get('/add', 'create')->name('brand.add');
                Route::post('/store', 'store')->name('brand.store');
            });

        //category
        Route::controller(CategoryController::class)
            ->prefix('category')->group(function () {
                Route::get('/', 'index')->name('category');
                Route::get('/add', 'create')->name('category.add');
                Route::post('/store', 'store')->name('category.store');
            });

        //SubCategory
        Route::controller(SubCategoryController::class)
            ->prefix('sub_catgory')->group(function () {
                Route::get('/', 'index')->name('sub_catgory');
                Route::get('/add', 'create')->name('sub_catgory.add');
                Route::post('/store', 'store')->name('sub_category.store');
                Route::get('/subcategory/ajax/{id}', 'ajaxSub');
            });

        //Products
        Route::controller(ProductController::class)
            ->prefix('product')->group(function () {
                Route::get('/', 'index')->name('product');
                Route::get('/add', 'create')->name('product.add');
                Route::post('/store/product', 'storeProduct')->name('product.store');
            });
    });
    //permissons
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/permission', 'index')->name('all.permission');
        Route::get('/create/permission', 'addPermission')->name('add.permission');
        Route::post('/permission/store', 'storePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'editPermission')->name('edit.permission');
        Route::post('/update/permission', 'updatePermission')->name('update.permission');
        Route::delete('/delete/permission/{id}', 'destory')->name('permission.destory');

        //roles in permission
        Route::get('/add/roles/permission', 'addrolespermision')->name('add.roles.permissions');
        Route::post('/store/roles/permission', 'rolePermissionStore')->name('role.permission.store');
    });

    //roles

    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/roles', 'allRoles')->name('all.roles');
        Route::get('/create/roles', 'addRoles')->name('add.roles');
        Route::post('/role/store', 'storeRoles')->name('store.roles');
        Route::get('/edit/role/{id}', 'editRoles')->name('edit.roles');
        Route::post('/update/role', 'updateRoles')->name('update.roles');

        Route::delete('/delete/roles/{id}', 'Roelsdestory')->name('roles.destory');
    });

    // manage admins
    Route::controller(AdminController::class)->group(function () {

        Route::get('/manage_all_admins', 'alladmin')->name('admin.all');
        Route::get('/add_admins/all', 'addAdmin')->name('add.all_admins');
        Route::post('/add_admins/store', 'storeAdmins')->name('admin.user.store');
    });

    //active user or user Management
    Route::controller(ActiveUserController::class)->group(function () {
        Route::get('/admin/all-users', 'index')->name('all.users');
        Route::get('/admin/all-vendor', 'all_active_vendors')->name('all.venders');
        Route::get('/admin/edit-vendor/{id}', 'detailVendor')->name('admin.vendor.details');
        Route::get('/user/status/{id}/{status}',  'userStatus')->name('all.venders.status');
    });
});
//vendor
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::controller(VendorController::class)->group(function () {

        Route::get('/vendor/dashboard', 'vindex')->name('vendor.dashboard');
        // Route::get('/vendor_logout', 'destroyvendor')->name('vendor.logout');
        Route::post('/vendor/logout', 'vend_logout')->name('vendor.logout');


        //user profile
        Route::get('vendor/vendor_profile', 'vendorProfile')->name('vendor_profile');
        Route::post('vendor/profile/store', 'vendorStore')->name('vendor.profile.store');
        Route::get('vendor/change/password', 'vendorchangePassword')->name('vendor.change');
        Route::post('vendor/update/password', 'UpdatVendorPass')->name('update.vendor.password');

        //VENDOR PRODUCT
        Route::controller(VendorProductController::class)
            ->prefix('vendor_product')->group(function () {
                Route::get('/', 'index')->name('vendor_product.all');
                Route::get('/add', 'addvendorProduct')->name('vendor_product.add');
                Route::get('/edit', 'editvendorProduct')->name('vendor_product.edit');
                Route::post('/store/vendor/product', 'storeVenProduct')->name('vendorproduct.store');
                Route::get('/vendor/{id}', 'vendorajax');
            });
    });
});

//checkout Routes

Route::get('/checkout', [\App\Http\Controllers\CheckOutController::class, 'index'])->name('checkout');
Route::post('/checkout-data/store', [\App\Http\Controllers\CheckOutController::class, 'CheckStore'])->name('checkout.store');


//stripe order
Route::post('/stripe/order', [\App\Http\Controllers\StripeController::class, 'stripe_payment'])->name('stripe.order');




//Shopping cart route
Route::get('/carts', [\App\Http\Controllers\ProductController::class, 'productList'])->name('products.list');
Route::post('/addtocart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/{id}', [\App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');

//search product
Route::post('/product/search', [\App\Http\Controllers\IndexController::class, 'productsearch'])->name('product.search');
// Route::get('/login', [\App\Http\Controllers\IndexController::class, 'login']);
