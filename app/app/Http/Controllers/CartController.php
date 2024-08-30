<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Cart;
use App\Item;

class CartController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function cart()
    {
        $items = new Item;
        $items = $items ->get();
        return view('cart',[
            'items' => $items,
         ]);
    }
    public function buy()
    {
        return view('buys/buy');
    }
    public function itembuyComp()
    {
        return view('buys/itembuy_comp');
    }
    public function buyComp()
    {
        return view('buys/buy_comp');
    }
}
