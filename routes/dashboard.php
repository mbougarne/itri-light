<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Posts\{
    All as AllPosts,
    Create as CreatePost,
    Update as UpdatePost,
    Delete as DeletePost
};

use App\Http\Controllers\Admin\Pages\{
    All as AllPages,
    Create as CreatePage,
    Update as UpdatePage,
    Delete as DeletePage
};

use App\Http\Controllers\Admin\Categories\{
    All as AllCategories,
    Create as CreateCategory,
    Update as UpdateCategory,
    Delete as DeleteCategory
};

use App\Http\Controllers\Admin\Contacts\{
    All as AllContacts,
    Create as CreateContact,
    Delete as DeleteContact,
    Single,
    Reply,
};

use App\Http\Controllers\Admin\Profiles\{UpdateProfile, UpdateUser};
use App\Http\Controllers\Admin\SettingController;

/**
 * ----------------------------------------------------------------------------
 *
 *  Admin routes
 *
 * ----------------------------------------------------------------------------
 */

# Posts
Route::group(['prefix' => 'posts'], function () {
    Route::get('/', AllPosts::class)->name('posts');
    Route::get('/create', [CreatePost::class, 'create'])->name('posts.create');
    Route::post('/create', [CreatePost::class, 'store'])->name('posts.create');
    Route::get('/update/{post}', [UpdatePost::class, 'edit'])->name('posts.update');
    Route::post('/update/{post}', [UpdatePost::class, 'update'])->name('posts.update');
    Route::post('/delete/{post}', DeletePost::class)->name('posts.delete');
});
# Pages
Route::group(['prefix' => 'pages'], function () {
    Route::get('/', AllPages::class)->name('pages');
    Route::get('/create', [CreatePage::class, 'create'])->name('pages.create');
    Route::post('/create', [CreatePage::class, 'store'])->name('pages.create');
    Route::get('/update/{page}', [UpdatePage::class, 'edit'])->name('pages.update');
    Route::post('/update/{page}', [UpdatePage::class, 'update'])->name('pages.update');
    Route::post('/delete/{page}', DeletePage::class)->name('pages.delete');
});
# Categories
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', AllCategories::class)->name('categories');
    Route::get('/create', [CreateCategory::class, 'create'])->name('categories.create');
    Route::post('/create', [CreateCategory::class, 'store'])->name('categories.create');
    Route::get('/update/{category}', [UpdateCategory::class, 'edit'])->name('categories.update');
    Route::post('/update/{category}', [UpdateCategory::class, 'update'])->name('categories.update');
    Route::post('/delete/{category}', DeleteCategory::class)->name('categories.delete');
});
# Contacts
Route::group(['prefix' => 'contacts'], function () {
    Route::get('/', AllContacts::class)->name('contacts');
    Route::post('/create', CreateContact::class)->name('contacts.create');
    Route::post('/reply/{contact}', Reply::class)->name('contacts.reply');
    Route::post('/delete/{contact}', DeleteContact::class)->name('contacts.delete');
    Route::get('/{contact}', Single::class)->name('contacts.single');
});
# Profile
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [UpdateProfile::class, 'edit'])->name('profile.update');
    Route::post('/', [UpdateProfile::class, 'update'])->name('profile.update');
});
# User
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UpdateUser::class, 'edit'])->name('user.update');
    Route::post('/', [UpdateUser::class, 'update'])->name('user.update');
});
# Settings
Route::group(['prefix' => 'settings'], function () {
    Route::get('/', [SettingController::class, 'edit'])->name('settings.update');
    Route::post('/', [SettingController::class, 'update'])->name('settings.update');
});
