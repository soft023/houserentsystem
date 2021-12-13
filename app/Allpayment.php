<?php 

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Allpayment extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name','vacancy_id','amountpaid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
  * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

}
