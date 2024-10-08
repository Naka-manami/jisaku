<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','item_id','count','comment'];

     public function user(){
         return $this->belongsTo('App\User','user_id');
     }
    public function item(){
        return $this->belongsTo('App\Item','item_id');
    }
}
