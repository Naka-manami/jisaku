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
use App\Like;




class DisplayController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   

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
    public function itemSearch(Request $request){
        // アイテムのクエリを作成
        $query = Item::query();
    //入力された数値やキーワードを取得。
        $keyword = $request->keyword;
        $kagen = $request->kagen;
        $jougen = $request->jougen;
        // 下限と上限の両方が設定されている場合
        if (!empty($kagen) && !empty($jougen)) {
            $query->whereBetween('price', [$kagen, $jougen]);
        }
        // 下限のみ設定されている場合
        elseif (!empty($kagen)) {
            $query->where('price', '>=', $kagen);
        }
        // 上限のみ設定されている場合
        elseif (!empty($jougen)) {
            $query->where('price', '<=', $jougen);
        }
        // キーワードが設定されている場合
        if (!empty($keyword)) {
            $query->where('item_name', 'LIKE', '%' . $keyword . '%');
        }
        // 最終的に結果を取得
        $items = $query->get();
   

        // ビューにデータを渡して表示
        return view('/items/item_list', [
            'items' => $items,
            'kagen' => $kagen,
            'jougen' => $jougen,
            'keyword'=> $keyword,
        ]);
    }
     //ヘッダーからお気に入りページへ遷移
     public function favo()
     {
         $instance= new Like;
         $likes =$instance->all();
         $user=Auth::user();//ログイン
         $likes = Like::where('user_id',$user->id)->get();
         $likes ->find($user);
     
         return view('favo',[
             'likes'=>$likes,
         ]);
     }

    //アカウント情報画面へ
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
        $instance = new Item;
        $item = $instance->find($id);

        return view('reviews/write_review',[
            'id' => $id,
            'item' => $item,
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

    //事業者用ホームへ遷移
    public function adminHome()
    {
        $user=Auth::user();
        $user -> get();
        dd($user);
        return view('admin_home',[
            'user'=>$user,

        ]);
    }
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
