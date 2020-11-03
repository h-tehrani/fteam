<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Traits\Visitable;

class indexContent extends Model
{
    use visitable;
    protected $fillable=['title','content','author','price','picURL'];
    public function Admin(){
        return $this->belongsTo('App\Admin');
    }

}
