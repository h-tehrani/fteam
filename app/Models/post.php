<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable=['author','division','title','content'];
    public function Admin(){
       return $this->belongsTo('App\Models\Admin');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\like', 'post_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\comment', 'post_id');
    }
    public function scopeSearch($query , $keyword)
    {
        $query->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%');
        return $query;
    }

}
