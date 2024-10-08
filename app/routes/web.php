<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\CartController;

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

// 
Route::post('');

//ホームボタンクリックでホームに戻る
Route::get('/', 'DisplayController@index')->name('home');
//検索ボタンクリックし該当の商品一覧(itemsディレクトリ内)へ移動
Route::get('/items/item_list','DisplayController@itemSearch')->name('item.search');


//商品画像クリックで商品詳細ページへ移動
Route::get('/item_detail/{id}', 'itemController@itemDetail')->name('item.detail');
//カートボタンクリックでカートページへ移動
Route::get('/cart/{id}', 'CartController@cart')->name('cart');
//カート内「次へ」ボタンクリックで購入ページへ移動
Route::post('/cart/{id}', 'CartController@cartcomp');
//ヘッダー内カートボタンクリックでカートリストへ
Route::get('/cartlist', 'CartController@cartList')->name('cart.list');

//届け先登録画面内「登録」ボタンクリックで購入確認画面へ戻る
Route::post('buys/user_itembuycomp/{cartid}', 'CartController@backbuyConf')->name('back.buyconf');
//購入画面「購入」ボタンクリックで購入確認画面へ移動
Route::get('buys/itembuy_conf/{id}', 'CartController@itembuyConf')->name('itembuy.conf');
//購入確認画面「購入」ボタンクリックで購入完了画面へ移動
Route::post('buys/itembuy_comp/{id}', 'CartController@itembuyComp')->name('itembuy.comp');
//購入確認画面「届け先登録」ボタンクリックで届け先登録画面へ移動
Route::get('buys/user_detail/{cartid}', 'CartController@userDetail')->name('user.detail');
//購入完了画面「ホームへ戻る」ボタンクリックでホーム画面へ移動
Route::get('/buy', 'CartController@buy')->name('buy');

//詳細画面のお気に入りボタンクリック(Ajax)
Route::post('ajaxlike', 'ItemController@ajaxlike')->name('items.ajaxlike');
//ヘッダーのお気に入りボタンクリックでお気に入りページへ移動
Route::get('/favo', 'DisplayController@favo')->name('favo');

//マイページ内アカウント情報ボタンクリックでアカウント情報ページへ移動
Route::get('/accounts/account', 'DisplayController@account')->name('account');
//マイページ内購入履歴ボタンクリックで購入履歴ページへ移動
Route::get('/buys/buyhistory', 'DisplayController@buyhistory')->name('buyhistory');
//購入履歴のレビューボタンクリックでレビュー記入ページへ移動
Route::get('/reviews/write_review/{id}', 'DisplayController@writeReview')->name('write.review');
//レビューを書くボタンクリックでレビュー完了ページへ移動
Route::post('/reviews/writereview_comp/{id}', 'DisplayController@writeComp')->name('write.comp');

//ボタンクリックでアカウント情報変更ページへ移動
Route::get('/accounts/account_edit/{id}', 'UserController@accountEdit')->name('account.edit');
//ボタンクリックでアカウント情報確認ページへ移動
Route::post('/accounts/account_comp/{id}', 'UserController@accountComp')->name('account.comp');

//ログイン機能

//パスワード再設定
Route::prefix('reset')->group(function () {
  // パスワード再設定用のメール送信フォーム
  Route::get('/', 'UsersController@requestResetPassword')->name('reset.form');
  // メール送信処理
  Route::post('/send', 'UsersController@sendResetPasswordMail')->name('reset.send');
  // メール送信完了
  Route::get('/send/complete', 'UsersController@sendCompleteResetPasswordMail')->name('reset.send.complete');
  // パスワード再設定
  Route::get('/password/edit', 'UsersController@resetPassword')->name('reset.password.edit');
  // パスワード更新
  Route::post('/password/update', 'UsersController@updatePassword')->name('reset.password.update');
});






//事業者URLから事業者用画面へ
Route::post('/admin_home', 'DisplayController@adminHome')->name('admin.home');
//事業者用商品登録ページへ移動
Route::post('/items/item_registrationcomp', 'ItemController@Itemregistrationcomp')->name('item.registrationcomp');

Route::get('/items/item_registration', 'ItemController@moveItemregistration')->name('item.registration');
//事業者用商品リストページへ移動
Route::get('/admin_itemlist', 'ItemController@moveadminitemlist')->name('admin.itemlist');
//事業者用ユーザリストページへ移動
Route::get('/admin_userlist', 'DisplayController@moveadminuserlist')->name('admin.userlist');


