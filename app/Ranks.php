<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranks extends Model
{
    protected $table = 'ratings';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
