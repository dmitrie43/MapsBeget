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
})->name('map');

Auth::routes();

Route::group(['middleware' => 'cors'], function () {
//    Route::get('/api', 'Api@index')->name('api'); //Примеры json
    Route::resource('api/organizations', 'Api\LocationController')->only(['index', 'show']);
    Route::get('/api/json', 'Api\LocationController@name')->name('jsonRus');
});

Route::group(['middleware' => 'cors'], function (){
    Route::get('/primary', 'MapController@index');
    Route::get('/teachers', 'MapController@getTeachers');
});

Route::group(['prefix' => 'home', 'middleware' => 'admin'], function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/list', 'ListController@index')->name('list');
    Route::get('/list/{id}', 'ListController@fullData')->name('fullData');
    Route::any('/create', 'ListController@create')->name('create');
    Route::post('/store', 'ListController@store')->name('store');
    Route::any('/destroy/{id}', 'ListController@destroy')->name('destroy');
    Route::get('/edit/{id}', 'ListController@edit')->name('edit');
    Route::any('/update/{id}', 'ListController@update')->name('update');
    //Профиль
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/profile/edit/{id}', 'UserController@edit')->name('editUser');
    Route::any('/profile/update/{id}', 'UserController@update')->name('updateUser');
});




