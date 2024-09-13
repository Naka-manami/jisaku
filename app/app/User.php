<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

   
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account','email','password','remember_token','name','tel','post','address'
    ];
    public function item(){
        return $this->hasmany('App\Item','user_id','id');
    }
    public function cart(){
        return $this->hasmany('App\Cart','user_id','id');
    }
    public function buyhistory(){
        return $this->hasmany('App\Buyhistory','user_id','id');
    }
    public function review(){
        return $this->hasmany('App\Review','user_id','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

}
