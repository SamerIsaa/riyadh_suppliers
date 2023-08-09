<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $attributes = ['final_price'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductPrice()
    {
        return isset($this->product?->offer_price) ? $this->product?->offer_price : $this->product?->price;
    }

    public function getFinalPriceAttribute()
    {
        return $this->getProductPrice() * $this->quantity;
    }
}
