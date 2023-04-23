<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/management', function (){
   return view('management.index');
});

Route::get('/cashier', 'Cashier\CashierController@index');
Route::get('/cashier/getMenuByCategory/{category_id}', 'Cashier\CashierController@getMenuByCategory');
Route::get('/cashier/getSaleDetailsByTable/{table_id}', 'Cashier\CashierController@getSaleDetailsByTable');
Route::get('/cashier/getTable', 'Cashier\CashierController@getTables');
Route::post("/cashier/orderFood","Cashier\CashierController@orderFood");
Route::post("/cashier/deleteSaleDetail", "Cashier\CashierController@deleteSaleDetail");
Route::post("/cashier/confirmOrderStatus", "Cashier\CashierController@confirmOrderStatus");
Route::post("/cashier/savePayment", "Cashier\CashierController@savePayment");

Route::resource('management/category','Management\CategoryController');
Route::resource('management/menu','Management\MenuController');
Route::resource('management/table','Management\TableController');
