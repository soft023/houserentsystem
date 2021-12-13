<?php 

namespace App;


use App\Tenant;
use App\House;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vacancy extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'house_id','name','house','amount','admin','status','country','state','town','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function tenants()
{
   return $this->belongsTo('App\Tenant');
}


    public function houses()
{
   return $this->belongsTo('App\House');
}


    
}
