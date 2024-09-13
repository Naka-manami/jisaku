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



class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function accountEdit(int $id,Request $request)
    {
        $user = new User;
        $user = Auth::user();
        $user -> account = $request ->account;
        $user -> email = $request ->mail;
        $user -> name = $request ->name;
        $user -> tel = $request ->tel;
        $user -> post = $request ->post;
        $user -> address = $request ->address;
      

        return view('accounts/account_edit',[
            'user' => $user,
            'id' => $id,
        ]);
    }

    public function accountComp(int $user,Request $request)
    {
     
        // $users = $instance ->find($user);
        $user = Auth::user();
        $user -> account = $request ->account;
        $user -> email = $request ->email;
        $user -> name = $request ->name;
        $user -> tel = $request ->tel;
        $user -> post = $request ->post;
        $user -> address = $request ->address;
        $user ->save();
        return view('accounts/account_comp');
    }

    // public function accountComp()
    // {
    //     return view('/home');
    // }
}
