<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandContoller;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderContoller;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
// http://ecom-udemy.test/clear
Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    echo Artisan::output();
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){

    Route::get('/login', 'AdminController@loginForm');
    Route::post('/login', 'AdminController@store')->name('admin.login');

});

//Admin Dashboard Using admin Guard
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');



//User All Route Here....
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/user/update/password', [IndexController::class, 'UserUpdatePassword'])->name('user.update.password');


//User Dashboard Using Default web Guard/
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {

    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard')->with('user',$user);
})->name('dashboard');


//===========> All Admin Section Route Here <============
Route::middleware(['auth:sanctum,admin','auth:admin'])->group(function(){

    //Admin All Route Here....
    Route::get('/admin/logout', 'AdminController@destroy')->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'AdminProfileupdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/change/password/update', [AdminProfileController::class, 'AdminChangePasswordUpdate'])->name('admin.change.password.update');

    //Admin Brand All Route
    Route::group(['prefix'=>'brand'], function(){

        Route::get('/view', [BrandContoller::class, 'BrandView'])->name('all.brand');
        Route::post('/store', [BrandContoller::class, 'BrandStore'])->name('brand.store');
        Route::post('/update/{id}', [BrandContoller::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandContoller::class, 'BrandDelete'])->name('brand.delete');

    });// end Route Group

    //Admin Category All Route
    Route::group(['prefix'=>'category'], function(){

        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
        
        //Admin Sub-Category All Route
        Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::post('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

        //Admin Sub Sub-Category All Route
        Route::get('/sub/sub/view',[SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');

        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
        /*2nd Step Dropdown Clickable Select Field*/
        Route::get('/subcategory/subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

        Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
        Route::post('/sub/sub/update/{id}', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
    });// end Route Group

    //Product Section All Route
    Route::group(['prefix'=>'product'], function(){

        //Route::get('/view', [ProductController::class, 'ProductView'])->name('all.category');
        Route::get('/view', [ProductController::class, 'ProductView'])->name('product.view');
        Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
        Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');
        Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
        Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
        Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    });// end Route Group

    //Admin Brand All Route
    Route::group(['prefix'=>'slider'], function(){

        Route::get('/view', [SliderContoller::class, 'SliderView'])->name('manage.slider');
        Route::post('/store', [SliderContoller::class, 'SliderStore'])->name('slider.store');
        Route::post('/update/{id}', [SliderContoller::class, 'SliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderContoller::class, 'SliderDelete'])->name('slider.delete');

        Route::get('/inactive/{id}', [SliderContoller::class, 'SliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderContoller::class, 'SliderActive'])->name('slider.active');

    });// end Route Group

});// end Middleware admin
//===========> End Admin Section Route Here <============



//===========> Start Frontend All Routes Here <============

// Multi Language All Routes 
Route::get('/language/bengali', [LanguageController::class, 'Bengali'])->name('bengali.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

// Product Details
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails'])->name('product.details');

// Frontend Tag wise Data
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct'])->name('product.tag');

// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct'])->name('product.subcategory');

// Frontend Sub SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct'])->name('product.subsubcategory');

// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
// Get Data from mini cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
Route::get('/product/mini/destroy', [CartController::class, 'AddMiniCartDestroy']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);


Route::get('/test', function(){
    return view('auth.admin_login');
});

