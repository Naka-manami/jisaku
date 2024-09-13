<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Item;
use App\Buyhistory;
use App\Review;




class ItemController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    //ホーム内商品一覧に表示
    public function viewItemlist(Request $request)
    {
        $items = new Item;
        $keyword = $request->keyword;
        //検索結果のみ表示
        if ($keyword) {
            $query->where(function($query) use ($keyword) {
                $query->where('item_name', 'LIKE', '%' . $keyword . '%');
            });
            $items = $query->get();
                
        }else{
        //全件表示
            $items = $query->get();
        }
        return view('home',[
            'items' => $items,
         ]);
    }

    //商品詳細
     public function itemDetail(int $id)
    {
        $instance = new Item;
        $item = $instance->find($id);

        $reviews = new Review;
        $review = $reviews->find($id);
        return view('items/item_detail',[
            'id' => $id,
            'item' =>$item,
            'review' => $review,
        ]);
    }

    //★事業者用
    //事業者用ホームへ遷移
    public function index()
    {
        return view('admin_home');
    }
    //商品登録画面へ移動
    public function moveItemregistration()
    {
        return view('items/item_registration');
    }
    //商品追加ページにて商品登録
    public function Itemregistrationcomp(Request $request)
    {
        $item = new Item;
        $item ->image = $request -> image;
        $item ->item_name = $request -> item_name;
        $item ->price = $request -> price;
        $item ->detail = $request -> detail;
        $item->save();
        return view('items/item_registrationcomp');
    }

    
    //事業者用商品一覧へ移動
    public function moveadminitemlist(Request $request)
    {
        //購入履歴のitem_idとitemテーブルのidが同じ物の販売個数を取得

        $buys= new Buyhistory;
        $items= $buys->with('item')->get();

        return view('items/admin_itemlist',[
            'items' => $items,
        ]);
    }

    
}