<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=['name','type','price','description','options','pictures','offPrice','offPercent'];

}
