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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/order/{any}', function () {
    return view('index');
})->where('any', '.*');

Route::get('/footer', function () {
    return view('layout.footer');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::get('/important-points', function () {
    return view('important-points');
});
Route::get('/forget-password', function () {
    return view('forget-password');
});
Route::get('/reset-password', function () {
    return view('reset-password');
});
Route::get('/factor', function () {
    return view('factor');
});
Route::get('/Calculate-turning-size', function () {
    return view('Calculate-turning-size');
})->name('turning');

Route::get('/payment/{status}/{message}/{Authority}/{price}', function ($status , $message , $Authority , $price) {
    return view('layout.payment' , compact(['status' , 'message' , 'Authority' , 'price']));
})->name('pay');

Route::group(['prefix' => '/admin'] , function (){
    Route::get('/add-discounts' , function (){
        return view('admin.add-copons');
    });
    Route::get('/add-type3' , function (){
        return view('admin.add-type3');
    });
    Route::get('/update-variables' , function (){
        return view('admin.update-variables');
    });
    Route::get('/order-details' , function (){
        return view('admin.order-detail');
    });
    Route::get('/add-price' , function (){
        return view('admin.add-price');
    });
    Route::get('/add-size' , function (){
        return view('admin.add-size');
    });
    Route::get('/list-costomer' , function (){
        return view('admin.list-costomer');
    });
    Route::get('/list-order' , function (){
        return view('admin.list-order');
    });
    Route::get('/setting' , function (){
        return view('admin.setting');
    });
});

Route::get('/admin' , function (){
    return view('admin.add-size');
});


Route::get('/user/{any}' , function (){
    return view('user.user_panel');
})->where('any' , '.*');

Route::get('/404' , function (){
    return view('layout.404');
});

Route::get('/pay' , function (){
    return view('pay');
});

//zarinpal
Route::get('/zarinpal/callback/{price}/{check}' ,'PayController@callback')->name('zarinpal.verify');
//Route::post('/zarinpal/request' , 'PayController@zarinPal_request');
//Route::get('/zarinpal/verify/{price}' , 'PayController@zarinPal_verify');

