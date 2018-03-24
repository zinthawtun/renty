<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P_type extends Model
{
    protected $table = "p_types";

    public function property()
    {

        return $this->hasOne('App\Property', 'type_id', 'id');
    }
}
