<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    use SoftDeletes;

    const FILLABLE = ['user_type', 'user_id', 'category_id', 'is_subscription', 'amount', 'status', 'subscription_id', 'type', 'payment_method'];
    protected $fillable = self::FILLABLE;


    const PENDING = "pending";
    const ACCEPTED = "accepted";
    const REJECTED = "rejected";


    public function user()
    {
        return $this->morphTo('user');
    }

    public function category()
    {
        return $this->belongsTo(FaqCategory::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case "pending" :
                return __('constants.pending');
            case "accepted" :
                return __('constants.accepted');
            case "rejected" :
                return __('constants.rejected');
            default :
                return __('constants.pending');
        }
    }

    public function getType()
    {
        switch ($this->type) {
            case "income" :
                return __('constants.income');
            case "expense" :
                return __('constants.expense');
            default :
                return __('constants.income');
        }
    }
    public function getPaymentMethod()
    {
        switch ($this->payment_method) {
            case "cash" :
                return __('constants.cash');
            case "bank_transfer" :
                return __('constants.bank_transfer');
            default :
                return __('constants.cash');
        }
    }

    public function scopeFilter($q)
    {

        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->whereHas('user', function ($q) use ($query) {
                $q->filter(request());
            })->orWhereHas('category', function ($q) use ($query) {
                $q->filter(request());
            });
        }


        if (isset($query['started_at'])) {
            $q->whereDate('created_at', '>=', $query['started_at']);
        }
        if (isset($query['ended_at'])) {
            $q->whereDate('created_at', '<=', $query['ended_at']);
        }
        if (isset($query['user_id'])) {
            $q->where('user_id', $query['user_id']);
        }
        if (isset($query['category_id'])) {
            $q->where('category_id', $query['category_id']);
        }

        if (isset($query['payment_method'])){
            $q->whereDate('payment_method' , $query['payment_method']);
        }

        if (request()->filled('date_from')) {
            $q->whereDate('created_at', '>=', request()->get('date_from'));
        }
        if (request()->filled('date_end')) {
            $q->whereDate('created_at', '<=', request()->get('date_end'));
        }
    }


    public function scopeStatus($q, $status)
    {
        return $q->where('status', $status);
    }
}
