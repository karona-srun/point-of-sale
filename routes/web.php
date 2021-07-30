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

// Index
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Change Language
Route::post('/language','LanguageController@index')->name('language');

// Customer
Route::get('customer','CustomerController@index')->name('customer.index');
Route::get('customer/create','CustomerController@create');
Route::post('customer/store','CustomerController@store');
Route::get('customer/show/{id}','CustomerController@show');
Route::get('customer/edit/{id}','CustomerController@edit');
Route::post('customer/update/{id}','CustomerController@update');
Route::get('customer/destroy/{id}','CustomerController@destroy');

// Supplier
Route::get('supplier','SupplierController@index')->name('supplier.index');
Route::get('supplier/create','SupplierController@create');
Route::post('supplier/store','SupplierController@store');
Route::get('supplier/show/{id}','SupplierController@show');
Route::get('supplier/edit/{id}','SupplierController@edit');
Route::post('supplier/update/{id}','SupplierController@update');
Route::get('supplier/destroy/{id}','SupplierController@destroy');

// Employee
Route::get('employee','EmployeeController@index');
Route::get('employee/create','EmployeeController@create');
Route::post('employee/store','EmployeeController@store');
Route::get('employee/show/{id}','EmployeeController@show');
Route::get('employee/edit/{id}','EmployeeController@edit');
Route::post('employee/update/{id}','EmployeeController@update');
Route::get('employee/destroy/{id}','EmployeeController@destroy');

// Role
Route::get('role','RoleController@index')->name('role');
Route::get('role/create','RoleController@create');
Route::post('role/store','RoleController@store');
Route::get('role/show/{id}','RoleController@show');
Route::get('role/edit/{id}','RoleController@edit');
Route::post('role/update/{id}','RoleController@update');
Route::get('role/destroy/{id}','RoleController@destroy');

// Store
Route::get('store','StoreController@index')->name('store.index');
Route::get('store/create','StoreController@create');
Route::post('store/store','StoreController@store');
Route::get('store/show/{id}','StoreController@show');
Route::get('store/edit/{id}','StoreController@edit');
Route::post('store/update/{id}','StoreController@update');
Route::get('store/destroy/{id}','StoreController@destroy');


// Manage_Items / Manage_Category
Route::get('manage_category','CategoryController@index')->name('manage_category.index');
Route::get('manage_category/create','CategoryController@create');
Route::post('manage_category/store','CategoryController@store');
Route::get('manage_category/edit/{id}','CategoryController@edit');
Route::post('manage_category/update/{id}','CategoryController@update');
Route::get('manage_category/show/{id}','CategoryController@show');
Route::get('manage_category/destroy/{id}','CategoryController@destroy');
Route::get('get_category', 'CategoryController@get_category');
Route::post('category', 'CategoryController@getcategory');

// Manage_Items / Manage_Item
Route::get('manage_item','ItemController@index')->name('manage_item.index');
Route::get('manage_item/create','ItemController@create');
Route::post('manage_item/store','ItemController@store');
Route::get('manage_item/edit/{id}','ItemController@edit');
Route::get('manage_item/show/{id}','ItemController@show');
Route::post('manage_item/update/{id}','ItemController@update');

// Manage_Items / Manage_Tax
Route::resource('manage_tax','TaxController');

// Purchase / Manage_Purchase
Route::get('manage_purchase','PurchaseController@index')->name('manage_purchase.index');
Route::get('manage_purchase/create','PurchaseController@create');
Route::post('manage_purchase/store','PurchaseController@store');
Route::get('manage_purchase/edit','PurchaseController@edit');
Route::post('manage_purchase/update','PurchaseController@update');

// Purchase / Purchase_History
Route::resource('purchase_history','PurchaseHistoryController');

// Sales / Manage_Sale
Route::resource('manage_sale','SaleController');

// Sales / Sale_History
// Route::resource('purchase_history','PurchaseHistoryController');

// Sales / Store_List
// Route::resource('purchase_history','PurchaseHistoryController');

//route retrieve photo path
Route::get('/store_avatars/{filename}', function ($filename){
    $path = storage_path() . '/store/' . $filename;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('store_avatars');

//route retrieve photo path
Route::get('/item/{filename}', function ($filename){
    $path = storage_path() . '/item/' . $filename;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('item');