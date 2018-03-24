<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P_style extends Model
{
    protected $table = "p_styles";

    public function property()
    {

        return $this->hasOne('App\Property', 'style_id', 'id');
    }

}
