<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table ='notifications';

    protected $fillable = [
        'n_id', 'message', 'user_id', 'p_id'
    ];

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\N_type');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
