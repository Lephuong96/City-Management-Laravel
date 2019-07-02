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

Route::get('/', function () {
    return view('welcome');
})->name('laravel');
Route::group(['prefix'=>'customers'], function (){
    Route::get('/', 'CustomerController@index')->name('customers.index');
    Route::get('/{id}/show', 'CustomerController@show')->name('customers.show');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/create', 'CustomerController@store')->name('customers.store');
    Route::get('/{id}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::post('/{id}/edit', 'CustomerController@update')->name('customers.update');
    Route::get('/{id}/destroy', 'CustomerController@destroy')->name('customers.destroy');
    Route::get('/filter','CustomerController@filterByCity')->name('customers.filterByCity');
});
Route::group(['prefix'=>'cities'], function (){
    Route::get('/', 'CityController@index')->name('cities.index');
    Route::get('/{id}/show', 'CityController@show')->name('cities.show');
    Route::get('/create', 'CityController@create')->name('cities.create');
    Route::post('/create', 'CityController@store')->name('cities.store');
    Route::get('/{id}/edit', 'CityController@edit')->name('cities.edit');
    Route::post('/{id}/edit', 'CityController@update')->name('cities.update');
    Route::get('/{id}/delete', 'CityController@destroy')->name('cities.destroy');
});
