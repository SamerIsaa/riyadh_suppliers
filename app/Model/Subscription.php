<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Subscription extends Model
{
    const FILLABLE = ['user_id' , 'monthly_installment' , 'started_at' , 'ended_at' , 'is_active' , 'status'];
    protected $fillable = self::FILLABLE;

    const PENDING = "pending";
    const ACCEPTED = "accepted";
    const REJECTED = "rejected";


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatus()
    {
        switch ($this->status){
            case "pending" :
                return __('constants.pending');
            case "accepted" :
                return  __('constants.accepted');
            case "rejected" :
                return  __('constants.rejected');
            default :
                return __('constants.pending');
        }
    }

    public function scopeFilter($q)
    {

        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->whereHas('user', function ($q) use ($query) {
                $q->filter(request());
            });
        }

        if (isset($query['started_at'])){
            $q->whereDate('started_at' , '>='  , $query['started_at']);
        }
        if (isset($query['ended_at'])){
            $q->whereDate('ended_at' , '<='  , $query['ended_at']);
        }

        if (request()->filled('date_from')){
            $q->whereDate('created_at' , '>=' , request()->get('date_from'));
        }
        if (request()->filled('date_end')){
            $q->whereDate('created_at' , '<=' , request()->get('date_end'));
        }
    }
}
