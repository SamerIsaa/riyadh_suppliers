<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'password', 'company_name', 'owner_name',
        'order_owner_country_code', 'order_owner_dial_code', 'order_owner_mobile_number', 'order_owner_mobile',
        'mobile_country_code', 'dial_code', 'mobile_number', 'mobile', 'commercial_registration_no', 'tax_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

//
//    public function sendPasswordResetNotification($token)
//    {
//        $this->notify(new ResetPasswordNotification($token));
//    }

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->where('name', 'like', "%{$query['generalSearch']}%")
                ->orWhere('mobile', 'like', "%{$query['generalSearch']}%")
                ->orWhere('email', 'like', "%{$query['generalSearch']}%");

        }
        return $q;
    }

}
