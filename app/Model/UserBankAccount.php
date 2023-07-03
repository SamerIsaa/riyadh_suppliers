<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBankAccount extends Model
{
    use SoftDeletes;

    const FILLABLE = ['id', 'name', 'account_no', 'bank', 'iban', 'user_id'];

    protected $fillable = self::FILLABLE;

    public function scopeForStore($q)
    {
        return $q->where('is_active', 1)->where('show_in_store', 1);
    }

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->where('iban', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('bank', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('account_no', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('name', 'like', '%' . $query['generalSearch'] . '%');
        }

        return $q;
    }
}
