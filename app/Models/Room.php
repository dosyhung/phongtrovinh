<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table="room";
    protected $guarded =[];
    public function attachments(){
        return $this->hasMany('App\Models\Attachments','room_id','id');
    }
}
