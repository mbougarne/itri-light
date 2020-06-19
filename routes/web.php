<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppInstallController as Install;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/install', [Install::class, 'install']);
Route::post('/install', [Install::class, 'store']);
