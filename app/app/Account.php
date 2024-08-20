<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['account','mail','password','remember_token','name','tel','post','address'];
}
