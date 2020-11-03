<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable=['nickName','Content'];

    public function post()
    {
        return $this->belongsTo('App\Models\post','post_id');
    }


}

