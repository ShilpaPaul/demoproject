<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DealerItemController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\MesssageController;
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





Route::get('/dashindex', function () {
    return view('dashindex');
});

Route::post('/productsearch',[DealerItemController::class,'productsearch']);

Route::get('/',[DealerItemController::class,'index']);

Route::post('/dread',[DealerController::class,'store']);

Route::get('/contact',[MesssageController::class,'create']);

Route::get('/shopproducts',[DealerItemController::class,'createproducts']);

Route::post('/message',[MesssageController::class,'store']);

Route::get('/products',[DealerItemController::class,'display'])->name('products');

Route::post('/dealer/login',[DealerController::class,'login'])->name('dealerlogin');

Route::post('/storeitem',[DealerItemController::class,'store'])->name('storeitem');

Route::post('/storeitemshop',[DealerItemController::class,'storeshop'])->name('storeitemshop');

Route::post('/delete{id}',[DealerItemController::class,'reject']);

Route::post('/remove{id}',[DealerItemController::class,'destroy']);

Route::get('/productdetail{id}',[DealerItemController::class,'createdetail']);

Route::post('/shopupdateitem{id}',[DealerItemController::class,'update']);

Route::post('/shopkeepercheck',[ShopController::class,'check'])->name('shopkeepercheck');

Route::post('/cread',[CustomerController::class,'store']);

Route::post('/customer/login',[CustomerController::class,'login'])->name('customerlogin'); 

Route::get('/customer/logout',[CustomerController::class,'logout'])->name('customerlogout');


Route::group(['middleware'=>['AuthCheck']], function(){

    Route::get('/shopkeeperlogin',[ShopController::class,'create'])->name('shopkeeperlogin');

    Route::get('/shopdashboard',[ShopController::class,'dashboard']);

    Route::get('/shopdealer',[ShopController::class,'dealer'])->name('shopdealer');

    Route::get('/details{id}{d_id}',[ShopController::class,'detail'])->name('details');

    Route::get('/shopadditem',[DealerItemController::class,'createshop'])->name('shopadditem');

    Route::get('/shopkeeper/logout',[ShopController::class,'logout'])->name('shopkeeperlogout');

    Route::get('/shopbuyitem{id}',[DealerItemController::class,'edit'])->name('shopbuyitem');
    
    Route::get('/shopsalestable',[SalesController::class,'shopview'])->name('shopsalestable');

    Route::get('/shopdealertable',[DealerController::class,'show'])->name('shopdealertable');

    Route::get('/shopcustomertable',[CustomerController::class,'show'])->name('shopcustomertable');

    Route::post('/delivered{id}',[SalesController::class,'update']);

    Route::post('/search',[SalesController::class,'search']);

    Route::get('/shopmessages',[MesssageController::class,'show']);
});



Route::group(['middleware'=>['AuthCustomer']], function(){

    Route::get('/customer',[CustomerController::class,'create'])->name('customer');

    Route::get('/customerdashboard',[CustomerController::class,'dashboard']);

    Route::post('/customerbuyitem{id}',[SalesController::class,'store']);

    Route::post('/customerreview{id}',[SalesController::class,'update']);
    
    Route::post('/custpass{id}',[CustomerController::class,'update']);
    
    Route::get('/customerpassword',[CustomerController::class,'index']);
    
    Route::get('/viewbill{id}',[DealerItemController::class,'createbill']);
});

Route::group(['middleware'=>['AuthDealer']], function(){

    Route::get('/dealerview',[DealerController::class,'create'])->name('dealerview');

    Route::get('/dealerdashboard',[DealerController::class,'dashboard']);

    Route::get('/dealeradditem',[DealerItemController::class,'create'])->name('dealeradditem');

});

Route::get('/dealer/logout',[DealerController::class,'logout'])->name('dealerlogout');



