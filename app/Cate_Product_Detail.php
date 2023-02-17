<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate_Product_Detail extends Model
{
    protected $table="cate_product_detail";

    protected $fillable = ['name','alias','parent_id','keyword','status'];

    public function product(){
   		return $this->hasMany('App\Product');
   	}
   	public function cate_product(){
    	return $this->belongsTo('App\Cate_product');
    }
}
