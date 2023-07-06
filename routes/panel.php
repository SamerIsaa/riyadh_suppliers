<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'as' => 'panel.'
], function () {

    Route::group(['prefix' => 'panel'], function () {

        Route::get('/', function () {
            return redirect(route('panel.showLogin'));
        });

        Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLogin');
        Route::post('login', 'Auth\LoginController@login')->name('login');

        /*
         * Reset Password Routes
         */

        Route::group(['prefix' => 'password/', 'namespace' => 'Auth', 'as' => 'password.'], function () {
            Route::post('email', ['as' => 'email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
            Route::get('reset/{token}', ['as' => 'reset', 'uses' => 'ResetPasswordController@showResetForm']);
            Route::post('reset', ['as' => 'update', 'uses' => 'ResetPasswordController@reset']);
        });


        Route::group(['middleware' => 'auth:admin'], function () {

            Route::get('logout', 'Auth\LoginController@logout')->name('logout');
            Route::get('index', 'HomeController@index')->name('index');

            Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {

                Route::group(['middleware' => 'permission:show_admins'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
                    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'AdminController@datatable']);
                });

                Route::group(['prefix' => 'create', 'middleware' => 'permission:add_admins'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'AdminController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'AdminController@store']);
                });
                Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_admins'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'AdminController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'AdminController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'AdminController@destroy']);
                });
            });
            Route::group(['as' => 'admin.'], function () {
                Route::get('/profile', ['as' => 'profile', 'uses' => 'AdminController@showProfile']);
                Route::post('/profile/update', ['as' => 'update.profile', 'uses' => 'AdminController@updateProfile']);
            });

            Route::group(['prefix' => 'permission', 'as' => 'permission.', 'middleware' => 'permission:manage_roles'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'RoleController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'RoleController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'RoleController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'RoleController@store']);
                });

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'RoleController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'RoleController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'RoleController@destroy']);
                });

                Route::post('deleteAll', ['as' => 'deleteAll', 'uses' => 'RoleController@deleteAll']);

            });


            // Faq Category Routes //
             Route::group(['prefix' => 'services', 'as' => 'services.','middleware' => 'permission:manage_services'], function () {
                Route::get('index', ['as' => 'index', 'uses' => 'ServiceController@index']);
                Route::get('datatable', ['as' => 'datatable', 'uses' => 'ServiceController@datatable']);

                Route::group(['prefix' => '/create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'ServiceController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'ServiceController@store']);
                });

                Route::group(['prefix' => '{id}/'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'ServiceController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'ServiceController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'ServiceController@destroy']);
                });
                Route::post('operation', ['as' => 'operation', 'uses' => 'ServiceController@operation']);
            });

             Route::group(['prefix' => 'faq/', 'as' => 'faq.','middleware' => 'permission:manage_faq'], function () {
                Route::get('index', ['as' => 'index', 'uses' => 'FaqController@index']);
                Route::get('datatable', ['as' => 'datatable', 'uses' => 'FaqController@datatable']);

                Route::group(['prefix' => '/create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'FaqController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'FaqController@store']);
                });

                Route::group(['prefix' => '{id}/'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'FaqController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'FaqController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'FaqController@destroy']);
                });
                Route::post('operation', ['as' => 'operation', 'uses' => 'FaqController@operation']);

            });



            Route::group(['prefix' => 'pages', 'as' => 'pages.','middleware' => 'permission:manage_pages'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'PageController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'PageController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'PageController@store']);
                });
                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'PageController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'PageController@update']);
                    Route::delete('/', ['as' => 'destry', 'uses' => 'PageController@destroy']);
                });

            });

            Route::group(['prefix' => 'home-page' , 'as' => 'home_page.','middleware' => 'permission:manage_pages'], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'PageController@indexHome']);
                Route::put('/', ['as' => 'store', 'uses' => 'PageController@storeHome']);
            });

            Route::group(['prefix' => 'settings' , 'as' => 'settings.','middleware' => 'permission:manage_settings'], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'SettingsController@index']);
                Route::put('/', ['as' => 'store', 'uses' => 'SettingsController@store']);
            });



            Route::group(['prefix' => 'help-center', 'as' => 'help-center.', 'namespace' => 'HelpCenter'], function () {

                Route::group(['prefix' => 'inbox', 'as' => 'inbox.','middleware' => 'permission:manage_inbox'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'InboxController@index']);
                    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'InboxController@datatable']);

                    Route::group(['prefix' => '{id}'], function () {
                        Route::get('/show', ['as' => 'show', 'uses' => 'InboxController@show']);
                        Route::delete('/', ['as' => 'destroy', 'uses' => 'InboxController@destroy']);
                    });

                    Route::post('/add-replay', ['as' => 'add-replay', 'uses' => 'InboxController@replay']);
                });
//                Route::group(['prefix' => 'complaints', 'as' => 'complaints.'], function () {
//                    Route::get('/', ['as' => 'index', 'uses' => 'ComplaintController@index']);
//                    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'ComplaintController@datatable']);
//
//                    Route::group(['prefix' => '{id}'], function () {
//                        Route::get('/show', ['as' => 'show', 'uses' => 'ComplaintController@show']);
//                        Route::delete('/', ['as' => 'destroy', 'uses' => 'ComplaintController@destroy']);
//                    });
//
//                    Route::post('/add-replay', ['as' => 'add-replay', 'uses' => 'ComplaintController@replay']);
//                    Route::post('{id}/operation/{status}', ['as' => 'operation', 'uses' => 'ComplaintController@operation']);
//                });
//
//
            });



            Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'UserController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'UserController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'UserController@store']);
                });

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'UserController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
                });
                Route::post('operation', ['as' => 'operation', 'uses' => 'UserController@operation']);


            });

            Route::group(['prefix' => 'notifications/', 'as' => 'notifications.',], function () {
                Route::group(['prefix' => '/send'], function () {
                    Route::get('/', ['as' => 'send', 'uses' => 'NotificationController@send']);
                    Route::post('/', ['as' => 'send.store', 'uses' => 'NotificationController@store']);
                });
            });


        });


    });

});


