<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'status', 'total'];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function getOrderStatusClass(): string
    {
        switch ($this->status) {
            case "new" :
            case  "in_progress":
                return "inprogress";

            case "completed":
                return "success";
        }
        return "";
    }

    public function getOrderStatusTrans(): string
    {
        return __('landing.order_statuses.' . $this->status);
    }


    public function scopeSearch($q)
    {
        $query = request('query');
        if (isset($query['generalSearch'])) {
            $q->whereHas('user', function ($q) {
                $q->filter();
            })->orWhereHas('products', function ($q) {
                $q->filter();
            });
        }
    }

    public function checkAllItemsFinalPrice(): void
    {
        $items = $this->products;
        if ($items->count() == $items->whereNotNull('final_price')->count()) {
            $this->total = $items->sum('final_price');
            $this->save();
        }
    }
}
