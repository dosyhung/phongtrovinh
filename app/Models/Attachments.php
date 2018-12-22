<?php

namespace App\Models;
use Modules\Room;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    protected $table="attachments";
    protected $guarded =[];
    public function room(){
       return $this->belongsTo('App\Models\Room','room_id','id');
    }
}
