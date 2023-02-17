<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table="page";

    protected $fillable = ['page_title','alias','desc','content','admin_id','status'];

    public function admin(){
   		return $this->belongsTo('App\Admin');
   	}
}
