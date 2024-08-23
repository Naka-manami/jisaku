<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Item;


class ItemController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewItemlist($request)
    {
        $items = new Item;
        $items -> item_name = $request -> item_name;
        $items -> price = $request -> price;
        $items -> image = $request -> image;

        $query = Item::select('*')->where('active', true);
        if ($keyword) {
            $query->where(function($query) use ($keyword) {
                $query->where('item_name', 'LIKE', '%' . $keyword . '%');
            });
            $items = $query->get();

            $find = DB::table('items')->find();
        
            return view('items/item_list',[
               'items' => $items,
            ]);
        }
    }
}