<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppInstallController as Install;
use App\Http\Controllers\Admin\Login;
use App\Http\Controllers\Guest\{Pages, Posts};

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


Route::get('/install', [Install::class, 'install'])->name('install');
Route::post('/install', [Install::class, 'store'])->name('install');

Route::group(['middleware' => ['guest', 'app.install']], function () {
    # Admin login
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [Login::class, 'getLogin'])->name('login');
        Route::post('/', [Login::class, 'login'])->name('login');
    });
    # Posts
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/{post}', [Posts::class, 'single'])->name('posts.post');
    });
    # Categories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/{category}', [Posts::class, 'category'])->name('categories.posts');
    });
    # Pages
    Route::get('/', [Pages::class, 'home'])->name('pages.home');
    Route::get('/contact', [Pages::class, 'contact'])->name('pages.contact');
    Route::get('/{page}', [Pages::class, 'single'])->name('pages.single');
});

Route::fallback( fn() => abort(404));
