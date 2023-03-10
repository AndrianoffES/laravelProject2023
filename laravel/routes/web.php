<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
Route::group(['prefix' =>'admin', 'as'=>'admin.'], function () {
    Route::resource('index', IndexController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::get('/', function(){
    return view('usersWelcome');
});

Route::get('/info', function(){
    return view('infoProject');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news,index');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->name('news.show')
    ->where('id', '\d+');
