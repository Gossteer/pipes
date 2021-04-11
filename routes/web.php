<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecordingsAdminController;
use App\Http\Controllers\RecordingsCustomerController;
use App\Http\Controllers\StoreAdminController;
use App\Http\Controllers\StoreController;
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');


Auth::routes();

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('store-admin', [StoreAdminController::class, 'index'])->name('store-admin.index');
    Route::get('category-admin', [CategoryController::class, 'index'])->name('category-admin.index');
    Route::get('recordings-admin', [RecordingsAdminController::class, 'index'])->name('recordings.admin');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::get('/table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('/typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('/icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('/map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('/notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('/rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('/upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::middleware(['auth'])->group( function () {
    Route::get('recordings-customer', [RecordingsCustomerController::class, 'index'])->name('profile.recordings.customer');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

