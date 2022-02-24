<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandContoller;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Frontend\IndexController;

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
})->name('dashboard');

//Admin All Route Here....
Route::get('/admin/logout', 'AdminController@destroy')->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'AdminProfileupdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/change/password/update', [AdminProfileController::class, 'AdminChangePasswordUpdate'])->name('admin.change.password.update');

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

//Admin Brand All Route
Route::group(['prefix'=>'brand'], function(){

    Route::get('/view', [BrandContoller::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandContoller::class, 'BrandStore'])->name('brand.store');
    Route::post('/update/{id}', [BrandContoller::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandContoller::class, 'BrandDelete'])->name('brand.delete');

});

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
});

Route::group(['prefix'=>'product'], function(){

    //Route::get('/view', [ProductController::class, 'ProductView'])->name('all.category');
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
});


Route::get('/test', function(){
    return view('auth.admin_login');
});

