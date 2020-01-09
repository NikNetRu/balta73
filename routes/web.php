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
use App\Category;


Route::get('/logout', function () {
Auth::logout();
return redirect('/');
});

Route::get('/home', function () {
    return redirect('/');
});


Route::get('/add', function () {
if (Auth::check()) {
$admin = Auth::user()->admin;
if ($admin = 1){
return view('add')->with('category',Category::All());
} else {
    return redirect('/');
}
}
return redirect('/');
});

Route::get('/addCategory', function () {
if (Auth::check()) {
$admin = Auth::user()->admin;
if ($admin = 1){
return view('addCategory');
} else {
    return redirect('/');
}
}
return redirect('/');
});

/*
Route::get('/container/{name}', function ($name) {

return Goods::createPage();
});
*/


Route::post('/add/product', 'LoadProduct@loadproduct')->name('load.product');
Route::post('/add/category', 'LoadCategory@loadcategory')->name('load.category');
Route::post('/order', 'Order@createOrderPage')->name('get.orderPage');  //создать страницу оформления заказа
Route::post('/container/BuyThis', 'Order@addToCart')->name('buyThis');  // купить из корзина покупок
Route::get('/', 'Content@get');
Route::get('main', 'Content@get');
Route::get('infoPayment', 'Content@infoPayment');
Route::get('about', 'Content@about');
Route::get('container/{categoryName}', 'Products@createPage');  
