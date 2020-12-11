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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


// Supplyer Route

Route::get('/add-supplyer','SupplyerController@addSupplyer');
Route::post('/store-supplyer-info','SupplyerController@storeSupplyerInfo');
Route::get('/all-supplyer','SupplyerController@allSupplyer');
Route::post('/supplyer-payment/{id}','SupplyerController@supplyerPayment');


// Customer route

Route::get('/add-customer','CustomerController@addCustomer');
Route::post('/store-customer-info','CustomerController@storeCustomerInfo');
Route::get('/all-customer','CustomerController@allCustomer');
Route::post('/customer-payment/{id}','CustomerController@customerPayment');


// Purchase Route

Route::get('/purchase/product','ProductController@addPurchase');
Route::post('/store-purchase-product','ProductController@storePurchaseProduct');
Route::get('/all-purchase','ProductController@allPurchase');



// Category Controller
Route::get('/add-category','CategoryController@addCategory');
Route::post('/store-category-info','CategoryController@storeCategory');
Route::get('/all-category','CategoryController@allCategory');



// POst Route

Route::get('/pos','CartController@viewPos');
// Route::post('/add-cart/{id}','CartController@addCart');

Route::post('/add-to-cart','CartController@addCart');

Route::get('/delete-item/{id}','CartController@deleteItem');
Route::post('/update-product/{id}','CartController@updateItem');
Route::post('/create-invoice','CartController@createInvoice');
Route::post('/confirm-invoice','CartController@confirmInvoice');
Route::get('/load-cart-data','CartController@loadCartData');


// Order Route

Route::get('/new-order','OrderController@newOrder');
Route::get('/view/order/{id}','OrderController@viewOrder');
Route::get('/confirm-order/{id}','OrderController@confirmOrder');
Route::get('/all-order','OrderController@allOrders');


// Expense Route

Route::get('/add-expense','ExpenseController@addExpense');
Route::post('/store-expense-info','ExpenseController@storeExpense');
Route::post('/store-expense-info','ExpenseController@storeExpense');
Route::get('/all-expense','ExpenseController@allExpense');
Route::post('/expense-of-day','ExpenseController@expensOfDay');
Route::post('/expense-of-month','ExpenseController@expensOfMonth');
Route::post('/expense-of-year','ExpenseController@expensOfYear');
Route::post('/yearly-expense','ExpenseController@yearlyExpense');

// Sell Report Route

Route::get('/to-day-sell','SellReportController@toDaySellReport');
Route::post('/sell-by-date','SellReportController@sellByDate');
Route::post('/sell-by-month','SellReportController@sellByMonth');
Route::post('/sell-by-year','SellReportController@sellByYear');



Route::get('/load-data','CartController@loadData');
