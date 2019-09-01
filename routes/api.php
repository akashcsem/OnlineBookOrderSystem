<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->user();
});


Route::apiResources(['user'=>'API\UserController']);
Route::get('profile', 'API\UserController@profile');

Route::apiResources(['group'=>'API\GroupController']);
Route::apiResources(['category'=>'API\CategoryController']);
Route::apiResources(['author'=>'API\AuthorController']);
Route::apiResources(['product'=>'API\ProductController']);
Route::get('/product/search/{search}', 'API\ProductController@search');
Route::apiResources(['publication'=>'API\PublicationController']);
Route::apiResources(['supplier'=>'API\SupplierController']);
Route::apiResources(['purchase'=>'API\PurchaseController']);


// public user

Route::get('currentUser','API\UserController@currentUser');
Route::get('category-list','API\CategoryController@category_list');
Route::get('author-list','API\AuthorController@author_list');
Route::get('supplier-list', 'API\SupplierController@supplier_list');
Route::get('product-list', 'API\ProductController@product_list');

Route::post('/purchase/products/{supplier}', 'API\PurchaseController@storeProducts');
