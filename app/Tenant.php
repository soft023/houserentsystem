<?php 

namespace App;

use App\Vacancy;
use App\Rent;
use App\Guarantor;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'vacancy_id','name','address','telephone','sex','religion','country','state','town',
    'gname','relationship','gaddress','gtelephone','duration','amount','amountpaid','balance','paymentstatus','rentstatus','admin','expires'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    

    public function vacancies()
{
   return $this->hasOne('App\Vacancy');
}

}
