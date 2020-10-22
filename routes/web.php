<?php

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
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');



Route::get('asset-sets', 'AssetSetController@index')->name("asset-sets");
Route::get('assets', 'AssetController@index')->name("assets");
Route::get('tags', 'TagController@index')->name("tags");
Route::get('users', 'UserController@index')->name("users");
Route::get('settings', 'SettingController@index')->name("settings");
