<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\DisplayController;
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
//ホームボタンクリックでホームに戻る
Route::get('/', 'DisplayController@index')->name('home');
//カートボタンクリックでカートページへ移動
Route::get('/cart', 'CartController@index')->name('cart');
//お気に入りボタンクリックでお気に入りページへ移動
Route::get('/favo', 'HomeController@index')->name('favo');
//検索ボタンクリックし該当の商品一覧(itemsディレクトリ内)へ移動
Route::get('/items/item_list',[DisplayController::class,'itemSearch'])->name('item.list');
//
Route::get('/item/item_list',[ItemComtroller::class,'viewItemlist'])->name('view_itemlist');