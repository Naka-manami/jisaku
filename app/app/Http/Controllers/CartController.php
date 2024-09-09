<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Cart;
use App\Item;
use App\Buyhistory;

class CartController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function cart(int $id)
    {
        $instance = new Item;
        $item = $instance->find($id);
        return view('cart',[
            'id' => $id,
            'item' => $item,
         ]);
    }
    public function cartcomp(int $id,Request $request)
    {
        $cart = new Cart;
        $cart -> item_id = $id ;
        $cart -> count = $request ->count;
        $user=Auth::user();
        $cart -> user_id = $id;
        $cart ->save();
        
        return redirect('/');
    }

    public function favoCart()
    {
        return view('cart');
    }
    //ヘッダーのカートボタンクリックでカートリストへ移動
    public function cartList(Request $request)
    {
        
        $instance= new Cart;
        $carts =$instance->all();
       //cartテーブルのuser_idと一致するusersテーブルからimage、price、item_nameを取得。
        $carts=Auth::user()->cart()->with('item')->get();
	    // $carts = Cart::with('users:id,image,item_name,price');
       
        return view('cartlist',[
            'carts' => $carts,
        ]);
    }
    //購入確認画面へ
    public function itembuyConf(int $id,Request $request)
    {
        // $totals = 0;
         $instance= new Cart;
        // $carts =$instance->all();
       //cartテーブルのitem_idと一致するItemテーブルのidを取得。
        $cart= $instance->with('item')->find($id);
	    // $carts = Cart::with('users:id,image,item_name,price');
       
        return view('buys/itembuy_conf',[
            'cart' => $cart,

        ]);
    }
    //届け先登録画面へ移動
    public function userDetail()
    {
        return view('buys/user_detail');
    }
    //届け先登録し商品購入確認画面へ
    public function backbuyConf(Request $request)
    {
        $users = new User;
        $users ->name = $request -> name;
        $users ->post = $request -> post;
        $users ->address = $request -> address;

        return view('buys/itembuy_conf',[
          'users' => $users,
        ]);
    }
    //カートidとitem_id、user_idが同じもののデータを購入履歴へ保存
    public function itembuyComp(int $id , Request $request)
    {
        //カート内購入商品のデータを購入履歴に移動
        $instance= new Cart;
        $cart= $instance->with('item')->find($id);

        $buy = new Buyhistory;
        $buy -> item_id = $cart -> item_id;
        $buy -> count = $cart -> count;
        Auth::user()->buyhistory()->save($buy);
        //購入した商品のデータをカートの中から削除        
        $cart->delete();
        return view('buys/itembuy_comp',[
        ]);
    }
    public function buy()
    {
        return redirect('/');
    }
}
