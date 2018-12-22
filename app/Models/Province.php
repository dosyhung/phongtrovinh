<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "new_province";
    protected $guard =[];
    public function district(){
        return $this->hasMany('App\Models\District','province_id','province_id');
    }
}
