<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    use SoftDeletes;


    const STATUS_SUCCSSES = 1;
    const STATUS_PAYD = 2;
    const STATUS_FAILED = 3;
    const STATUSES = [
        self::STATUS_SUCCSSES => 'Создан',
        self::STATUS_PAYD => 'Оплачен',
        self::STATUS_FAILED=> 'Отменен'
    ];

    protected $casts = [
      'date_of_order'=>'date'
    ];

    protected $guarded = false;

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function executors() : hasMany
    {
        return $this->hasMany(Executor::class);
    }




}
