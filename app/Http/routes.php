<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return redirect()->route('gallery.list');
});

Route::get('gallery_list',['uses' => 'GalleryController@index','as' => 'gallery.list']);

Route::post('gallery/photo/upload/{id}',['uses'=>'GalleryController@saveGalleryPhoto','as' => 'gallery.upload']);

Route::get('gallery/view/{id}',['uses' => 'GalleryController@viewGallery' , 'as' => 'gallery.view']);


Route::post('gallery/save','GalleryController@saveGalleryName');

Route::post('gallery/edit/{id}','GalleryController@updateGalleryName');

Route::get('gallery/delete/{id}','GalleryController@deleteGallery');

Route::auth();

Route::get('/home', 'HomeController@index');
