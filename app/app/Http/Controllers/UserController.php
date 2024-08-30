<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\User;


class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function createSpendForm(){
        
    }
    public function accountEdit()
    {
        return view('accounts/account_edit');
    }

    public function accountConf()
    {
        return view('accounts/account_conf');
    }
}
