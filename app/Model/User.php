<?php

namespace App\Model;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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
        'ssn_id', 'name', 'email', 'password', 'avatar', 'fcm_token', 'api_token',
        'mobile_country_code', 'dial_code', 'mobile_number', 'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'fcm_token', 'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function scopeFilter($q, Request $request)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->where('name', 'like', "%{$query['generalSearch']}%")
                ->orWhere('ssn_id', 'like', "%{$query['generalSearch']}%")
                ->orWhere('mobile', 'like', "%{$query['generalSearch']}%")
                ->orWhere('email', 'like', "%{$query['generalSearch']}%");

        }
        return $q;
    }

    public function bank_accounts()
    {
        return $this->hasMany(UserBankAccount::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function paymentLog()
    {
        return $this->hasMany(PaymentLog::class);
    }
}
