<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return redirect('/country/spanish');
})->name('frontend');
Route::get('/country/{country}', [App\Http\Controllers\Frontend\FrontendController::class, 'getPostData'])->name('front.page');

Route::get('/rebaudo-login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/rebaudo-login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/', function (){
        return redirect(route('post.index'));
    });
    Route::resource('post', App\Http\Controllers\Admin\PostsController::class)->except('show');
    Route::get('post/preview', [App\Http\Controllers\Admin\PostsController::class, 'preview'])->name('preview');
    Route::prefix('setting')->group(function (){
        Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('setting.index');
        Route::post('/', [App\Http\Controllers\Admin\SettingController::class, 'store'])->name('setting.store');
    });
    Route::post('/upload-image', [App\Http\Controllers\Admin\FileHandlerController::class, 'upload'])->name('upload.file');
});

//Auth::routes();
