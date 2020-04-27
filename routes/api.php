<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$middleware = ['api'];
if (\request()->header('Authorization'))
    $middleware = array_merge(['auth:api']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create/price' , 'Material_SizeController@create');
Route::post('/setting' , 'SettingController@update');
Route::get('/setting/index' , 'SettingController@index');
Route::post('/create/size' , 'SizeController@create');
Route::post('/create/off' , 'DiscountController@create');
Route::get('/discounts' , 'DiscountController@index');
Route::post('/off' , 'DiscountController@off')->middleware('auth:api');
Route::post('/create/material' , 'MaterialController@create');
Route::post('/oneColorToner' , 'MonochromePrintingCostController@create');
Route::post('/oneColorProfit' , 'MonochromeProfitMarginController@create');
Route::post('/ColorfulProfit' , 'ColorfulProfitMarginController@create');
Route::post('/ColorfulToner' , 'ColorfulPrintingCostController@create');
Route::post('/CoverCost' , 'CoverCostController@create');
Route::post('/BindingCost' , 'BindingController@create');
Route::post('/Cal' , 'CalculationController@create')->middleware($middleware);
Route::get('/index/sizes' , 'SizeController@index');
Route::get('/index/materials' , 'MaterialController@index');
Route::get('/pay/verify' , 'PayController@zarinPal_verify');
Route::get('/pay/request' , 'PayController@zarinPal_request');
Route::post('/create/order' , 'OrderController@store')->middleware('auth:api');
Route::get('/orders' , 'OrderController@index');
Route::get('/order/{id}/delete' , 'OrderController@deleteOrder');
Route::get('/order/{id}/verify' , 'OrderController@verification');
Route::get('/user/orders' , 'OrderController@userOrders')->middleware('auth:api');
Route::get('/requestForPay/{id}' , 'OrderController@RequestForPay')->middleware('auth:api');
Route::get('/order/{id}' , 'OrderController@single');
Route::get('/prices' , 'Material_SizeController@index');

//users
Route::get('/users' , 'UserController@index');
Route::get('/user/wallet' , 'UserController@userInvoices')->middleware('auth:api');
Route::get('/{table}/{id}/delete' , 'UserController@deleteEverything');
Route::post('/create/creditLimit/{id}' , 'UserController@set_credit_limit');
Route::post('/create/prepayment/{id}' , 'UserController@set_prepayment');
Route::post('/use/creditLimit' , 'UserController@checkAndUseCredit')->middleware('auth:api');
Route::post('/use/prepayment' , 'UserController@checkAndUsePrepayment')->middleware('auth:api');
Route::get('/check/discounts' , 'UserController@checkForDiscount')->middleware('auth:api');
Route::post('/search/{table}/{param}' , 'UserController@search');
Route::post('/register' , 'UserController@register');
Route::post('/login' , 'UserController@login');
Route::post('/getcode' , 'UserController@getCode');
Route::post('/verification' , 'UserController@verificationTheCode');
Route::get('/{id}/deleteUser' , 'UserController@deleteUser');
Route::post('/edit' , 'UserController@edit')->middleware('auth:api');
Route::post('/upload/files' , 'FileController@upload')->middleware('auth:api');
Route::get('/download/{id}/{type}/{name}' , 'FileController@download');
Route::post('/logo' , 'FileController@logo');
Route::get('/logo/show' , 'FileController@getLogo');
Route::get('/order/{id}/files' , 'FileController@filesForOrder');
Route::post('/changePassword' , 'UserController@changePassword');
Route::get('/user' ,function (){
    return auth()->user();
})->middleware('auth:api');
Route::get('/user/exclusive_discounts' , 'ExclusiveDiscountController@index');
Route::post('/create/off/type' , 'TypeDiscountController@store');
Route::get('/show/off/type' , 'TypeDiscountController@index');
Route::post('/use/off/type' , 'TypeDiscountController@use');
Route::post('/create/variables' , 'VariableController@store');
Route::get('/show/variables' , 'VariableController@index');
Route::post('/create/exclusive_discounts' , 'ExclusiveDiscountController@create');
Route::post('/delete/exclusive_discounts' , 'ExclusiveDiscountController@destroy');
Route::post('/use/exclusive_discounts' , 'ExclusiveDiscountController@use')->middleware('auth:api');
Route::post('/sendMessage' , 'sendMessageController@send')->middleware('auth:api');

Route::post('/zarinpal/request' , 'PayController@zarinPal_request')->middleware('auth:api');
Route::post('/zarinpal/request/checkout' , 'PayController@checkout')->middleware('auth:api');


