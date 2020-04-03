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

Route::get('/', 'LandingController@index')->name('landing.index');

Route::name('features')->group(function () {
    Route::prefix('features')->group(function () {
        Route::get('/', 'LandingController@features');
        Route::get('/saving-book', 'LandingController@featuresSaving')->name('.saving');
        Route::get('/transaction', 'LandingController@featuresTransaction')->name('.transaction');
        Route::get('/budgeting', 'LandingController@featuresBudgeting')->name('.budgeting');
        Route::get('/insight', 'LandingController@featuresInsight')->name('.insight');
    });
});

Route::get('about', 'LandingController@about')->name('about');
Route::get('legal-notice', 'LandingController@disclaimer')->name('disclaimer');
Route::get('privacy-policy', 'LandingController@privacy')->name('privacy');
Route::get('sla', 'LandingController@sla')->name('sla');
Route::get('pricing', 'LandingController@pricing')->name('pricing');

Route::resource('contact', 'ContactController')->only([
    'index', 'store'
])->names([
    'index' => 'contact',
    'store' => 'contact.store'
]);
Route::get('help', 'LandingController@help')->name('help');
Route::get('brand-asset', 'LandingController@brandAsset')->name('brand-asset');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('savings', 'SavingsController');
    Route::resource('transactions', 'TransactionsController');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::post('/account', 'AccountController@update')->name('account.update');
});
