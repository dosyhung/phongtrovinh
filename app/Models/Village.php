<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table ="new_village";
    protected $guard =[];
    public function district(){
        return $this->belongsTo('App\Models\District','district_id','village_id');
    }
}
