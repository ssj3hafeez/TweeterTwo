<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    protected $table = 'tweets';

public function user(){
    return $this->belongsTo('App\User');
}

}
