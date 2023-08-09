<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'init_price', 'final_price'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {
            $q->whereHas('product', function ($q) {
                $q->filter();
            });

        }
        return $q;
    }



    public function getFinalPrice():float|null
    {
        return isset($this->final_price) ? $this->final_price * $this->quantity : null;
    }

}
