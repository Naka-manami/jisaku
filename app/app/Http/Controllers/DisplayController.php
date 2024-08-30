<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Item;

class DisplayController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //ヘッダーからお気に入りページへ遷移
    public function favo()
    {
        return view('favo');
    }
    public function favoCart()
    {
        return view('cart');
    }
 
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
    //ユーザ情報ページへ遷移
    public function account()
    {
        return view('accounts/account');
    }//購入履歴へ遷移
    public function buyHistory()
    {
        return view('buys/buyhistory');
    }


    //事業者ページ↓
    //事業者ホームからユーザ一覧へ遷移
    public function moveadminuserlist()
    {
        return view('admin_userlist');
    }
    
}
