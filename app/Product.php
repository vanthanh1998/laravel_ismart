<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   	protected $table = 'product';
   	protected $fillable = ['product_name','alias','price_new','price_old','product_desc','product_content','image','qty_product','keyword','admin_id','cate_product_detail_id','selling_product','featured_product','status','product_total_rating','product_total_number'];
      // public static function productSearch($keyword, $paginate){
      //    return Product::where('product_name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
      // }
      public function fimage(){
         return $this->hasMany('App\List_image');
      }

   	public function comment(){
   		return $this->hasMany('App\Comment');
   	}
   	public function admin(){
   		return $this->belongsTo('App\Admin');
   	}
   	public function cate_product(){
   		return $this->belongsTo('App\Cate_product');
   	}
   	public function bill_detail(){
   		return $this->belongsTo('App\Bill_detail');
   	}

}
