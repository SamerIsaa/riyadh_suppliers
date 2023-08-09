<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'init_price', 'final_price'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
