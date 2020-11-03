<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class job extends Model
{
    protected $fillable=['fullName','email','phone','abilityLevel','ability','descriptionAbility','description'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function scopeSearch($query , $keyword)
    {
        $query->where('fullName', 'like', '%' . $keyword . '%')
            ->orWhere('phone', 'like', '%' . $keyword . '%')
            ->orWhere('abilityLevel', 'like', '%' . $keyword . '%')
            ->orWhere('ability', 'like', '%' . $keyword . '%')
            ->orWhere('descriptionAbility', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%');
        return $query;
    }
}
