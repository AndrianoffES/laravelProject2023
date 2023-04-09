<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\UsersFeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
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

Route::middleware('auth')->group( function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'is_admin'], static function (): void {
        Route::get('/', IndexController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', UserController::class);

    });
});



Route::get('/info', function(){
    return view('infoProject');
});
Route::group(['prefix'=>'news', 'as'=>'news.'], static function():void {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');
    Route::get('{id}', [NewsController::class, 'show'])
        ->name('show')
        ->where('id', '\d+');

});




Route::get('/categories', [CategoryController::class, 'index'])->name('news.categories');
Route::get('categories/{category}', [NewsController::class, 'newsByCategory'])
    ->name('newsByCategory');

Route::resource('/feedback', UsersFeedbackController::class);
Route::resource('/order', OrderController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
