<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageViewController;

Route::prefix('/')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/', [PageViewController::class, 'home'])->name('home');
    Route::get('/sayfalar/{url}', [PageViewController::class, 'about'])->name('about');
    Route::get('/odalar', [PageViewController::class, 'roomsCategory'])->name('roomsCategory');
    Route::get('/odalar/{url}', [PageViewController::class, 'showRoom'])->name('showRoom');
    Route::get('/aktiviteler', [PageViewController::class, 'activities'])->name('activities');
    Route::get('/iletisim', [PageViewController::class, 'contact'])->name('contact');
});

Route::prefix('/NPanel')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::match(['get', 'post'], 'login', 'AdminController@login');

    Route::group(['middleware' => ['admin']], function () {
        Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
        Route::get('dashboard', 'AdminController@dashboard');
        Route::match(['get', 'post'], 'update-password', 'AdminController@updatePassword');
        Route::match(['get', 'post'], 'update-admin', 'AdminController@updateAdmin');
        Route::post('checkPassword', 'AdminController@checkPassword');
        Route::get('logout', 'AdminController@logout');

        // homepage
        Route::prefix('homepage')->group(function () {
            Route::get('/', 'HomepageController@index');
            Route::match(['get', 'post'], 'crud/{id?}', 'HomepageController@edit');
            Route::get('delete/{id?}', 'HomepageController@destroy');
        });

        // pages
        Route::prefix('pages')->group(function () {
            Route::get('/', 'PagesController@index');
            Route::post('update-pages-status', 'PagesController@update');
            Route::match(['get', 'post'], 'add-edit-pages/{id?}', 'PagesController@edit');
            Route::get('delete-pages/{id?}', 'PagesController@destroy');
        });

        // menus
        Route::prefix('menus')->group(function () {
            Route::get('/', 'MenusController@index');
            Route::post('add', 'MenusController@add');
            Route::post('updateOrder', 'MenusController@updateOrder');

            Route::prefix('types')->group(function () {
                Route::get('/', 'MenusController@type');
                Route::match(['get', 'post'], 'crud/{id?}', 'MenusController@crudType');
                Route::get('delete/{id?}', 'MenusController@typeDestroy');
            });
        });

        // sliders
        Route::prefix('sliders')->group(function () {
            Route::get('/', 'SlidersController@index');
            Route::match(['get', 'post'], 'crud/{id?}', 'SlidersController@edit');
            Route::get('delete/{id?}', 'SlidersController@destroy');
        });

        // settings
        Route::prefix('settings')->group(function () {
            Route::match(['get', 'post'], 'update/{id?}', 'SettingsController@edit');
        });

        // rooms
        Route::prefix('rooms')->group(function () {
            Route::get('/', 'RoomsController@index');
            Route::match(['get', 'post'], 'crud/{id?}', 'RoomsController@edit');
            Route::get('delete/{id?}', 'RoomsController@destroy');

            Route::prefix('features')->group(function () {
                Route::get('/', 'RoomsController@featuresIndex');
                Route::match(['get', 'post'], 'crud/{id?}', 'RoomsController@featuresEdit');
                Route::post('save', 'RoomsController@featuresCreate');
                Route::get('delete/{id?}', 'RoomsController@featuresDestroy');
            });
            Route::prefix('categories')->group(function () {
                Route::get('/', 'RoomsController@categoryIndex');
                Route::match(['get', 'post'], 'crud/{id?}', 'RoomsController@categoryCrud');
                Route::get('delete/{id?}', 'RoomsController@categoryDestroy');
            });
            Route::prefix('images')->group(function () {
                Route::post('delete/{id?}', 'RoomsController@imagesDestroy');
            });
        });

        // Blogs
        Route::prefix('blogs')->group(function () {
            Route::get('/', 'BlogsController@index');
            Route::match(['get', 'post'], 'crud/{id?}', 'BlogsController@edit');
            Route::get('delete/{id?}', 'BlogsController@typeDestroy');
            Route::prefix('categories')->group(function () {
                Route::get('/', 'BlogsController@categoryIndex');
                Route::match(['get', 'post'], 'crud/{id?}', 'BlogsController@categoryCrud');
                Route::get('delete/{id?}', 'BlogsController@categoryDestroy');
            });
        });

        // activities
        Route::prefix('activities')->group(function () {
            Route::match(['get', 'post'], 'update/{id?}', 'ActivitiesController@edit');
            Route::prefix('images')->group(function () {
                Route::post('delete/{id?}', 'ActivitiesController@imagesDestroy');
            });
        });
    });
});
