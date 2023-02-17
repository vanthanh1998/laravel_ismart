<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate_post extends Model
{
    protected $table="cate_post";

    protected $fillable = ['name','alias','keyword','status'];

    public function post(){
   		return $this->hasMany('App\Post');
   	}
}
