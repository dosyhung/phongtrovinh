<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $guarded =[];

    //lấy ra chuyên mục cha
    public function parent(){
        return $this->belongsTo('App\Models\Category','parent_id');
    }
    //lấy ra chuyên mục con
    public function children(){
        return $this->hasMany('App\Models\Category','parent_id');
    }
    public function news(){
        return $this->hasMany('App\Models\News','category_id','id');
    }
}
