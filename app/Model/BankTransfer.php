<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BankTransfer extends Model
{
    const FILLABLE = [
        'user_id', 'bank_account_id', 'name', 'bank', 'iban', 'account_no',
        'amount', 'status',
    ];

    protected $fillable = self::FILLABLE;

    const PENDING = "pending";
    const ACCEPTED = "accepted";
    const REJECTED = "rejected";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->whereHas('user', function ($q) use ($query) {
                $q->filter(request());
            })->orWhereHas('bankAccount', function ($q) use ($query) {
                $q->filter();
            })
                ->orWhere('name', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('bank', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('iban', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('account_no', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('amount', 'like', '%' . $query['generalSearch'] . '%');
        }

        return $q;
    }

    public function scopeStatus($q , $status)
    {
        return $q->where('status' , $status);
    }
}
