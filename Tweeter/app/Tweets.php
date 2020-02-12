<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    protected $table = 'tweets';

public function user(){
    return $this->belongsTo('App\User');
}


public function comments(){
    return $this->hasMany('App\Comments');
}

public function like(){
    return $this->hasMany('App\Like');
}

}
