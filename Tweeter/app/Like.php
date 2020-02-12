<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tweets(){
        return $this->belongsTo('App\tweet');
    }
}
