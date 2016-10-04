<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'HomeController@index');
/*
  site controller
 */

Route::get('/', 'site@index');
Route::get('page/{page_slug}/{id}', 'site@page');
Route::get('/services/', 'site@services');

/*
  post controller
 */

Route::get('/all-post/{type}', 'post@index');
Route::get('/all-post', 'post@index');

Route::get('/new-post', 'post@create');
Route::get('/edit-post/{id}', 'post@edit');
Route::post('update', 'post@update');

Route::get('delete-post/{id}', 'post@destroy');
Route::resource('/save', 'post@store');

Route::get('/post-details/{id}', 'post@show');


Route::get('menu/', 'settingsController@menu');
Route::post('menu-update', 'settingsController@menu_update');

Route::get('theme-option/{tab}', 'settingsController@theme_option');
Route::post('logo-uploads', 'settingsController@site_logo');
Route::post('save-theme-option', 'settingsController@save_theme_option');


//mediaController Route

Route::get('add-media', 'mediaController@create');
Route::get('media', 'mediaController@index');
Route::get('remove-media/{id}', 'mediaController@destroy');
Route::resource('ajax-uploads', 'mediaController@store');
//galleryController Route

Route::get('gallery', 'galleryController@index');
Route::resource('get-ajax-images', 'galleryController@all_ajax_images');
Route::resource('ajax-media-caption', 'galleryController@get_caption');
Route::resource('ajax-caption-update', 'galleryController@ajax_caption_update');
Route::resource('ajax-gallery-update', 'galleryController@ajax_gallery_update');
Route::post('save-gallery-name', 'galleryController@create');
Route::get('remove-gallery-item/{id}', 'galleryController@destroy');


//thene one Route

Route::get('theme-one', 'theme_one\themeoneController@index');
Route::get('all-books', 'theme_one\themeoneController@all_books');
Route::get('contact-us', 'theme_one\themeoneController@contact_us');
Route::get('image-gallery', 'theme_one\themeoneController@image_gallery');
Route::get('book-details/{page_slug}/{id}', 'theme_one\themeoneController@page');
