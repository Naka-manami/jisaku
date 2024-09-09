<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Item;
use App\User;
use App\Buyhistory;


class DisplayController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //ヘッダーからお気に入りページへ遷移
    public function favo()
    {
        return view('favo');
    }

    //ホームの商品一覧
    public function index()
    {
        $items = new Item;
        $items = $items ->get();
        return view('home',[
            'items' => $items,
         ]);
    }

    //ホーム画面商品一覧に検索結果のアイテムを表示
    public function itemSearch(Request $request)
    {
        $items = new Item;
        $keyword = $request->keyword;
        $query = $items;

        if ($keyword) {
            
            $query = $query->where('item_name', 'LIKE', '%' . $keyword . '%');
            $items = $query->get();
            
        }
        return view('home',[
            'items' => $items,
         ]);
    }

    public function account()
    {
        $users = new User;
        $users=Auth::user();
      

        return view('accounts/account',[
            'users' => $users,
        ]);
    }
    
    //購入履歴へ遷移
    public function buyhistory()
    {
        $instance = new Buyhistory;
        $buyhistorys= $instance->all();
        $buyhistorys=Auth::user()->buyhistory()->with('item')->get();
	    // $carts = Cart::with('users:id,image,item_name,price');

        return view('buys/buyhistory',[
            'buyhistorys' => $buyhistorys,
        ]);
    }


    //事業者ページ↓
    //事業者ホームからユーザ一覧へ遷移
    public function moveadminuserlist()
    {
        $instance = new User;
        $users = $instance->all();
        return view('admin_userlist',[
            'users' => $users,
        ]);
    }
    
}
