<?php

use App\Http\Controllers\Front\ContactController;
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

Route::group(['prefix' => 'password/'], function () {
    Route::get('reset/{token}' , 'Api\V1\User\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('reset' , 'Api\V1\User\Auth\ResetPasswordController@reset')->name('password.update');
});

Route::get('images/{path}/{size?}', 'MediaController@getPhoto');
Route::get('lang/{locale}', 'HomeController@setLanguage');


Route::prefix('/image')->group(function () {
    Route::post('/upload', ['as' => 'upload.image', 'uses' => 'ImageController@upload_image']);
    Route::post('/delete', ['as' => 'delete.image', 'uses' => 'ImageController@delete_image']);
    Route::get('/{size}/{id}', ['as' => 'size.image', 'uses' => 'ImageHandler@getPublicImage']);
    Route::get('/limit/{size}/{id}', ['as' => 'limit.image', 'uses' => 'ImageHandler@getImageResize']);
    Route::get('/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getDefaultImage']);
});
Route::prefix('/file')->group(function () {
    Route::get('/{file}', ['as' => 'file.show', 'uses' => 'FileController@show']);
    Route::post('/uploadFile', ['as' => 'upload.file', 'uses' => 'FileController@upload_file']);
    Route::post('/delete', ['as' => 'delete.file', 'uses' => 'FileController@delete_file']);
});


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'as' => 'front.',
    'namespace' => 'Front'
], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::get('/faqs', ['as' => 'faqs', 'uses' => 'HomeController@faqs']);

    Route::group(['prefix' => 'products' , 'as' => 'products.'] , function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
        Route::get('/{id}/show', ['as' => 'show', 'uses' => 'ProductController@show']);

    });

    Route::group(['prefix' => 'contact-us' , 'as' => 'contacts.'] , function () {
        Route::post('/', [ ContactController::class , 'store'])->name('store');
    });


    Route::get('/page/{id}', ['as' => 'page.show', 'uses' => 'HomeController@page']);

});
//Route::get('/' , function (){
//    return view('welcome');
//});
