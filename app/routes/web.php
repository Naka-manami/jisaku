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
Route::get('/cart', 'CartController@cart')->name('cart');
//カート内「次へ」ボタンクリックで購入ページへ移動
Route::post('buys/buy', 'CartController@buy')->name('buy');
//購入画面「購入」ボタンクリックで購入完了画面へ移動
Route::post('buys/itembuy_comp', 'CartController@itembuyComp')->name('itembuy.comp');
//購入完了画面「ホームへ戻る」ボタンクリックでホーム画面へ移動
Route::get('buys/buy_comp', 'CartController@buyComp')->name('buy.comp');

//お気に入りボタンクリックでお気に入りページへ移動
Route::get('/favo', 'DisplayController@favo')->name('favo');
//お気に入りボタンクリックでお気に入りページへ移動
Route::post('/cart', 'DisplayController@favoCart')->name('favo.cart');

//マイページ内アカウント情報ボタンクリックでアカウント情報ページへ移動
Route::get('/accounts/account', 'DisplayController@account')->name('account');
//マイページ内購入履歴ボタンクリックで購入履歴ページへ移動
Route::get('/buys/buyhistory', 'DisplayController@buyHistory')->name('buyhistory');

//アカウント情報画面
//ボタンクリックでアカウント情報変更ページへ移動
Route::get('/accounts/account_edit', 'UserController@accountEdit')->name('account.edit');
//ボタンクリックでアカウント情報確認ページへ移動
Route::post('/accounts/account_conf', 'UserController@accountConf')->name('account.conf');

//検索ボタンクリックし該当の商品一覧(itemsディレクトリ内)へ移動
Route::get('/items/item_list',[DisplayController::class,'itemSearch'])->name('item.list');



//事業者URLから事業者用画面へ
Route::get('/admin_home', 'ItemController@index')->name('admin.home');
//事業者用商品登録ページへ移動
Route::post('/items/item_registrationcomp', 'ItemController@Itemregistrationcomp')->name('item.registrationcomp');

Route::get('/items/item_registration', 'ItemController@moveItemregistration')->name('item.registration');
//事業者用商品リストページへ移動
Route::get('/admin_itemlist', 'ItemController@moveadminitemlist')->name('admin.itemlist');
//事業者用ユーザリストページへ移動
Route::get('/admin_userlist', 'DisplayController@moveadminuserlist')->name('admin.userlist');


