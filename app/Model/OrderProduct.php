<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 'product_code', 'quantity', 'unit_price', 'final_price'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->where('product_code', 'like', "%{$query['generalSearch']}%");
        }
        return $q;
    }


}
