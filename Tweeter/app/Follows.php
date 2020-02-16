<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    protected $table = 'follow';

    public $timestamps = false;
    protected $primaryKey = 'followed_id';
    public $incrementing = false;
    public $keyType = 'string';

    public function user(){
        return $this->belongsTo('App\User');
    }

}
