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
use App\Review;



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

    public function account(Request $request)
    {
        $user=Auth::user();
        return view('accounts/account',[
            'user'=> $user,
        ]);
    }
    
    //購入履歴へ遷移
    public function buyhistory()
    {
        $instance = new Buyhistory;
        $buyhistorys= $instance->all();
	    // $carts = Cart::with('users:id,image,item_name,price');
        return view('buys/buyhistory',[
            'buyhistorys' => $buyhistorys,
        ]);
    }
    public function writeReview(int $id)
    {

        return view('reviews/write_review',[
            'id' => $id,
        ]);
    }
    public function writeComp(int $id,Request $request)
    {
        $review = new Review;
        $review -> item_id = $id ;

        $review ->title = $request -> title;
        $review ->content = $request -> content;
        
        $user=Auth::user();
        $review -> user_id = $user -> id;
        $review->save();

        return view('reviews/writereview_comp');
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
