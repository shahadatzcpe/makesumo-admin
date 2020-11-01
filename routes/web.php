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
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/asset-sets/index', 'AssetSetController@index')->name('asset-sets.index');
Route::get('/asset-sets/create', 'AssetSetController@create')->name('asset-sets.create');
Route::get('/asset-sets/{assetSet}', 'AssetSetController@show')->name('asset-sets.show');
Route::get('/asset-sets/{assetSet}/upload-form', 'AssetSetController@uploadForm')->name('asset-sets.upload-items');
Route::get('/asset-sets/{assetSet}/pending-items', 'AssetSetController@pendingItems')->name('asset-sets.pending-items');

Route::get('/items/index', 'ItemController@index')->name("items.index");

Route::get('/tags/index', 'TagController@index')->name("tags.index");


Route::get('/users/index', 'UserController@index')->name("users.index");
Route::get('/users/paid-subscribers', 'UserController@paidSubscribers')->name("users.paid-subscribers");
Route::get('/users/trails-subscribers', 'UserController@trailSubscribers')->name("users.trail-subscribers");

Route::get('/mail/create', 'MailController@create')->name("mails.create");
Route::get('/mail/index', 'MailController@index')->name("mails.index");

Route::get('/mailing-lists', 'MailingListController@index')->name("mailing-lists.index");
Route::get('/mailing-lists/subscribers', 'MailingListController@subscribers')->name("mailing-lists.subscribers");
Route::get('/transactions/index', 'TransactionController@index')->name("transactions.index");


//Route::get('settings', 'SettingController@index')->name("settings");
