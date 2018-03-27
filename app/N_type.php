<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class N_type extends Model
{
    protected $table ="n_types";

    public function n_type()
    {

        return $this->hasOne('App\Notification', 'n_id', 'id');
    }
}
