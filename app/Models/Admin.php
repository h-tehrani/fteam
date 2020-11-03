<?php



namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable{
    use Notifiable;
    protected $guard = 'admin';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = ['password'];
    public function posts(){
        return $this->hasMany('App\Models\post');
    }
    public function indexContent(){
    return $this->hasMany('App\Models\post');
}
}