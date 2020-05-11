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
});

//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
	Route::resource('restaurants', 'backend\RestaurantController');
	Route::resource('restaurant-users', 'backend\RestaurantUserController');
	Route::resource('branch-offices', 'backend\BranchOfficeController');
	Route::resource('categories', 'backend\CategoryController');
	Route::resource('menus', 'backend\MenuController');
	Route::resource('areas', 'backend\AreaController');
	Route::resource('tables', 'backend\TableController');
	Route::resource('ingredients', 'backend\IngredientController');
	Route::resource('branch-office-ingredients', 'backend\BranchOfficeIngredientController');

});