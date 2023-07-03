<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    const FILLABLE = ['user_id', 'category_id', 'amount', 'bank_transfer_id'];
    protected $fillable = self::FILLABLE;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(FaqCategory::class);
    }

    public function bankTransfer()
    {
        return $this->belongsTo(BankTransfer::class);
    }

    public function scopeNoBankTransfer($q)
    {
        return $q->whereNull('bank_transfer_id');
    }
}
