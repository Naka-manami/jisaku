<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Like;

class Like extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function item(){
        return $this->belongsTo('App\Item','item_id','id');
    }
    public function like_exist($user_id, $item_id) {
        return Like::where('user_id', $user_id)->where('item_id', $item_id)->exists();
    }
}
