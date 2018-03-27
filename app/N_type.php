<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class N_type extends Model
{
    protected $table ="n_types";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function notification()
    {
        return $this->hasOne('App\Notification', 'n_id', 'id');
    }
}
