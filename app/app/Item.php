<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Item extends Model
{
    protected $fillable = ['item_name','price','image','detail','review'];

}
