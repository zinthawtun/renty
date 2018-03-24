<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $table = 'properties';

    protected $fillable = [
        'address', 'post_code', 'user_id', 'type_id', 'property_key', 'expired_date', 'tenant_no', 'style_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\P_type');
    }


    public function style()
    {
        return $this->belongsTo('App\P_style');
    }
}
