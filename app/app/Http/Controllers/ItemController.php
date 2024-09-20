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
use App\Like;





class ItemController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    //ホーム内商品一覧に表示
    

    //商品詳細
     public function itemDetail(int $id)
    {
        // $instance = new Item;
        // $item = $instance->find($id);

        $reviews = new Review;
        $reviews = $reviews->where('item_id',$id)->get();

        $item = Item::withCount('likes')->find($id);
        $like_model = new Like;

        return view('items/item_detail',[
            'id' => $id,
            'item' =>$item,
            'reviews' => $reviews,
            'like_model'=>$like_model,
        ]);
    }
    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $item_id = $request->item_id;
        $like = new Like;
        $item = Item::findOrFail($item_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $item_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('item_id', $item_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->item_id = $request->item_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $itemLikesCount = $item->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'itemLikesCount' => $itemLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }


    //★事業者用
    
    //商品登録画面へ移動
    public function moveItemregistration()
    {
        return view('items/item_registration');
    }
    //商品追加ページにて商品登録
    public function Itemregistrationcomp(Request $request)
    {
        // dd($request->file('image'));
        $item = new Item;
        $item ->item_name = $request -> item_name;
        $item ->price = $request -> price;
        $item ->detail = $request -> detail; 

        // 拡張子つきでファイル名を取得
        $imageName = $request->file('image')->getClientOriginalName();
        // 拡張子のみ
        $extension = $request->file('image')->getClientOriginalExtension();
         // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
        $item ->image = $newImageName;
// dd($request->file('image'));
        $item->save();
       
         // レコードを挿入したときのIDを取得
         $lastInsertedId = $item->id;

         // ディレクトリを作成
        if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
            mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
        }

        //パスを作成し、ファイルを移動
        $destinationPath = public_path("img/{$lastInsertedId}");
        $request->file('image')->move($destinationPath, $newImageName);

      
        return view('items/item_registrationcomp');
    }

    
    //事業者用商品一覧へ移動
    public function moveadminitemlist(Request $request)
    {
        //購入履歴のitem_idとitemテーブルのidが同じ物の販売個数を取得
        $buys= new Buyhistory;
 

        $items = $buys->with('item')
            ->select('item_id')
            ->selectRaw('SUM(count) AS total_count')
            ->groupBy('item_id')
            ->get();
 
        return view('items/admin_itemlist',[
            'items' => $items,
        ]);
    }

    // public function clickFavo(Request $request)
    // {
    //      if ( $request->input('like_product') == 0) {
    //          //ステータスが0のときはデータベースに情報を保存
    //          LikeProduct::create([
    //              'product_id' => $request->input('product_id'),
    //               'user_id' => auth()->user()->id,
    //          ]);
    //         //ステータスが1のときはデータベースに情報を削除
    //      } elseif ( $request->input('like_product')  == 1 ) {
    //          LikeProduct::where('product_id', "=", $request->input('product_id'))
    //             ->where('user_id', "=", auth()->user()->id)
    //             ->delete();
    //     }
    //      return  $request->input('like_product');
    // } 


    
}