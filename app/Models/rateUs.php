<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class rateUs extends Model
{
    protected $fillable=['rateContent'];
    public function user(){
        return $this->belongsTo('App\User');
    }

}
