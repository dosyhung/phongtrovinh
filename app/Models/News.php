<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table="news";
    protected $guarded =[];
    //
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function admins(){
        return $this->belongsTo('App\Models\Admin','admin_id','id');
    }
}
