<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Models\post','post_id');
    }

}

