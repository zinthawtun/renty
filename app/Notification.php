<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table ='notifications';

    protected $fillable = [
        'n_id', 'message', 'user_id', 'p_id'
    ];

    public function n_type()
    {
        return $this->belongsTo('App\N_type');
    }
}
