<?php

// Route::view('/', 'landing-page');
Route::get('/','LandingPageController@index')->name('landing-page');
Route::get('/shop','ShopController@index')->name('shop.index');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');
// Route::view('/shop', 'shop');
Route::view('/product', 'product');
Route::view('/cart', 'cart');
Route::view('/checkout', 'checkout');
Route::view('/thankyou', 'thankyou');
