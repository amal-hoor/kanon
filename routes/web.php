<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

        Route::group(['prefix' => 'conversations'], function () {

            Route::get('/', 'ConversationController@index')->name('api.admin.conversations.index');

        });
        Route::group(['prefix' => 'messages'], function () {

            Route::get('/', 'MessageController@index')->name('api.admin.messages.index');

        });
    });

});




Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function(){

    Route::get('/login','authController@index' )->name('admin.login.index');

    Route::post('/login','authController@login' )->name('admin.login');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin' , 'middleware' => 'auth.admin'], function () {

    Route::get('/logout','authController@logout' )->name('admin.logout');

    Route::get('/home','homeController@index' )->name('admin.home');

    Route::get('/', 'adminController@index')->name('admin.index');

    Route::get('/create', 'adminController@create')->name('admin.create');

    Route::post('/store', 'adminController@store')->name('admin.store');

    Route::get('/{id}/edit', 'adminController@edit')->name('admin.edit');

    Route::put('/{id}/update', 'adminController@update')->name('admin.update');

    Route::delete('/{id}/destroy', 'adminController@destroy')->name('admin.destroy');


    Route::group(['prefix' => 'users'], function () {

        Route::get('/', 'userController@index')->name('user.index');

        Route::get('/create', 'userController@create')->name('user.create');

        Route::post('/store', 'userController@store')->name('user.store');

        Route::get('/{id}/edit', 'userController@edit')->name('user.edit');

        Route::put('/{id}/update', 'userController@update')->name('user.update');

        Route::put('/{id}/blockuser', 'userController@updateblock')->name('user.block');

        Route::delete('/{id}/destroy', 'userController@destroy')->name('user.destroy');

    });

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', 'categoryController@index')->name('category.index');

        Route::post('/store', 'categoryController@store')->name('category.store');

        Route::get('/{id}/edit', 'categoryController@edit')->name('category.edit');

        Route::put('/{id}/update', 'categoryController@update')->name('category.update');

        Route::delete('/{id}/destroy', 'categoryController@destroy')->name('category.destroy');
    });

    Route::group(['prefix' => 'consults'], function () {

        Route::get('/', 'consultController@index')->name('consult.index');

        Route::get('/create', 'consultController@create')->name('consult.create');

        Route::post('/store', 'consultController@store')->name('consult.store');

        Route::get('/{id}/edit', 'consultController@edit')->name('consult.edit');

        Route::put('/{id}/update', 'consultController@update')->name('consult.update');

        Route::delete('/{id}/destroy', 'consultController@destroy')->name('consult.destroy');
    });


    Route::group(['prefix' => 'blogs'], function () {

        Route::get('/', 'blogController@index')->name('blog.index');

        Route::get('/create', 'blogController@create')->name('blog.create');

        Route::post('/store', 'blogController@store')->name('blog.store');

        Route::get('/{id}/edit', 'blogController@edit')->name('blog.edit');

        Route::put('/{id}/update', 'blogController@update')->name('blog.update');

        Route::delete('/{id}/destroy', 'blogController@destroy')->name('blog.destroy');

    });

    Route::group(['prefix' => 'videos'], function () {

        Route::get('/', 'videoController@index')->name('video.index');

        Route::get('/create', 'videoController@create')->name('video.create');

        Route::post('/store', 'videoController@store')->name('video.store');

        Route::get('/{id}/edit', 'videoController@edit')->name('video.edit');

        Route::put('/{id}/update', 'videoController@update')->name('video.update');

        Route::delete('/{id}/destroy', 'videoController@destroy')->name('video.destroy');

    });

    Route::group(['prefix' => 'orders'], function () {

        Route::get('/', 'orderController@index')->name('order.index');

        Route::put('/{id}/update', 'orderController@update')->name('order.update');

    });


    Route::group(['prefix' => 'chat'], function () {

        Route::get('/', 'messageController@index')->name('message.index');

        Route::post('/', 'messageController@store')->name('message.store');

    });

});

//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
