<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function message_board()
    {

        return $this->hasOne('App\MessageBoard', 'category_id', 'id');
    }
}
