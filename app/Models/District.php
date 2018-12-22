<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table ="new_district";
    protected $guarded =[];
    public function village(){
        return $this->hasMany('App\Models\Village','district_id','district_id');
    }
    public function province(){
        return $this->belongsTo('App\Models\Province','province_id','district_id');
    }
}
