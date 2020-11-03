<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ticket extends Model
{
    protected $fillable=['ticketTitle','ticketContent','email'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
