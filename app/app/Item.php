<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Item extends Model
{
    protected $fillable = ['item_name','price','image','detail','review'];
    public function user(){
        return $this->belongsto('App\User','user_id','id');
    }
}
