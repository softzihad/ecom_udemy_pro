<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\Frontend\IndexController;;

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


Route::get('/test', function(){
    return view('auth.admin_login');
});

