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
    public function itembuyConf(Request $request)
    {
        $totals = 0;
        $instance= new Cart;
        $carts =$instance->all();
       //cartテーブルのuser_idと一致するusersテーブルからimage、price、item_nameを取得。
        $cart=Auth::user()->cart()->with('item')->get();
	    // $carts = Cart::with('users:id,image,item_name,price');
       
        return view('buys/itembuy_conf',[
            'carts' => $cart,
            'totals' => $totals,
        ]);
    }
    //
    public function userDetail()
    {
        return view('buys/user_detail');
    }
    public function buckbuyConf(Request $request)
    {
        $user = new User;
        $user ->name = $request -> name;
        $user ->post = $request -> post;
        $user ->address = $request -> address;
        $user->save();
        return view('buys/item_buyconf');
    }
    //カートidとitem_id、user_idが同じもののデータを購入履歴へ保存
    public function itembuyComp(int $id)
    {
        $items = new Item;
        $item = $items->find($id);
        $users = new User;
        $user = $users->find($id);
        return view('buys/itembuy_comp',[
        'id' => $id,
        'item' => $item,
        'user' =>$user,
        ]);
    }
    public function buyComp()
    {
        return view('buys/buy_comp');
    }
}
