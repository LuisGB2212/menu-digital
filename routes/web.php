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
//namespace('backend')->prefix('admin')
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'backend'], function() {
	Route::resource('restaurants', 'RestaurantController');
	Route::resource('restaurant-users', 'RestaurantUserController');
	Route::resource('branch-offices', 'BranchOfficeController');
	Route::resource('categories', 'CategoryController');
	Route::resource('menus', 'MenuController');
	Route::resource('areas', 'AreaController');
	Route::resource('tables', 'TableController');
	Route::resource('ingredients', 'IngredientController');
	Route::resource('branch-office-ingredients', 'BranchOfficeIngredientController');

	Route::resource('menu-table-diners', 'MenuTableDinerController');
	
	Route::resource('table-products', 'TableProductController');

	/*Ordenes*/
	Route::resource('table-diners', 'TableDinerController');

});