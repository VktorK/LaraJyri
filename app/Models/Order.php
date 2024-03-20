<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use HasFilter;
    use SoftDeletes;


    const STATUS_SUCCSSES = 1;
    const STATUS_PAYD = 2;
    const STATUS_FAILED = 3;
    const STATUSES = [
        self::STATUS_SUCCSSES => 'Создан',
        self::STATUS_PAYD => 'Оплачен',
        self::STATUS_FAILED => 'Отменен'
    ];

    protected $casts = [
        'date_of_order' => 'date'
    ];

    protected $guarded = false;

//    protected static function booted()
//    {
//        static::created(callback: function (Order $order) {
//            $transaction = $order->transactions()->create([
//                "value" => $order->total_price
//            ]);
//        });
//    }


    public
    function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public
    function executors(): hasMany
    {
        return $this->hasMany(Executor::class);
    }

    public
    function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_user', 'order_id', 'product_id')
            ->withPivot('qty');
    }

    public
    function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public
    function getTotalPriceAttribute(): int
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += (int)$product->price * $product->pivot->qty;
        }
        return $total;
    }

}




