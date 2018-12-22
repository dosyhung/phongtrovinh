<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admins";
    protected $guarded =[];
    //
    public function news(){
        return $this->hasMany('App\Models\News','admin_id','id');
    }
}
