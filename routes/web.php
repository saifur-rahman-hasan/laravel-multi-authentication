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

Route::get('/', 'Website\HomeController@index');

Auth::routes();

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
|
*/
Route::group([
    'namespace' => 'Website',
], function(){

    Route::get('home', 'HomeController@home')->name('home');
    Route::get('explore/categories', 'WebsiteCategoryController@index')->name('explore.categories.index');
    Route::get('explore/categories/{id}/show', 'WebsiteCategoryController@show')->name('explore.categories.show');
    Route::get('explore/categories/{id}/services', 'WebsiteCategoryController@showServices')->name('explore.categories.services');
    Route::get('explore/services', 'WebsiteServiceController@index')->name('explore.services.index');
    Route::get('explore/services/{id}/show', 'WebsiteServiceController@show')->name('explore.services.show');
    Route::get('explore/tasks', 'WebsiteTaskController@index')->name('explore.tasks.index');
    Route::get('explore/tasks/{id}/show', 'WebsiteTaskController@show')->name('explore.tasks.show');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
|
*/

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function(){

    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');

    Route::get('/', 'HomeController@index')->name('admin');
    Route::get('home', 'HomeController@home')->name('admin.home');

    Route::resource('users', 'AdminUserController')->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'delete' => 'admin.users.delete'
    ]);

    Route::resource('categories', 'AdminCategoryController')->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy'
    ]);

    Route::resource('services', 'AdminServiceController')->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'delete' => 'admin.services.delete'
    ]);

});

