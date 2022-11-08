<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminAddCategoryComponent;
use App\Http\Livewire\admin\AdminEditCategoryComponent;
use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminAddProductComponent;
use App\Http\Livewire\admin\AdminEditProductComponent;
use App\Http\Livewire\admin\AdminHomeSliderComponent;
use App\Http\Livewire\admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\admin\AdminHomeCategoryComponent;
use App\Http\Livewire\admin\AdminSaleComponent;
use App\Http\Livewire\admin\AdminCouponsComponent;
use App\Http\Livewire\admin\AdminAddCouponsComponent;
use App\Http\Livewire\admin\AdminEditCouponsComponent;
use App\Http\Livewire\admin\AdminOrderDetailsComponent;
use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\AdminContactComponent;
use App\Http\Livewire\admin\AdminSettingComponent;


use App\Http\Livewire\admin\AdminAttributesComponent;
use App\Http\Livewire\admin\AdminAddAttributeComponent;
use App\Http\Livewire\admin\AdminEditAttributeComponent;


use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\admin\AdminOrderComponent;
use App\Http\Livewire\ContactComponent;

use App\Http\Controllers\UserController;


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
Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');;
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details'); // Termékoldal útvonala
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category'); // ez a name() az útvonal neve
Route::get('/search', SearchComponent::class)->name('product-search');
Route::get('/kapcsolat', ContactComponent::class)->name('kapcsolat');
#Route::controller('/kijelentkezes', UserController::class)->name('kijelentkezes');




Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function(){

});



/*
Route::controller(UserController::class, 'logout')->group(function(){

Route::post('logout', 'logout')->name('kijelentkezes');

});
*/







Route::middleware(['auth:sanctum', 'verified'])->group(function(){

	Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
	Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
	Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}', AdminEditCategoryComponent::class)->name('admin.editcategory');
	Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
	Route::get('/admin/products/add', AdminAddProductComponent::class)->name('admin.addproduct');
	route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct'); //products_slug az aktuális terméknév amire kattint és módosítani akarja

	Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
	Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
	Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
	Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
	Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');


	Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
	Route::get('/admin/coupon/add', AdminAddCouponsComponent::class)->name('admin.addcoupons');
	Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponsComponent::class)->name('admin.editcoupons');
	Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
	Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
	Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
	Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
	Route::get('/admin/kapcsolat', AdminContactComponent::class)->name('admin.kapcsolat');
	Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');

	Route::get('/admin/attributes', AdminAttributesComponent::class)->name('admin.attributes'); // útvonal neve
	Route::get('/admin/attributes/add', AdminAddAttributeComponent::class)->name('admin.add_attributes');
	Route::get('/admin/attributes/edit/{attribute_id}', AdminEditAttributeComponent::class)->name('admin.edit_attribute');







});

require __DIR__.'/auth.php';
