<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;


    protected $valueOne = 10;
    protected $valueTwo = 15;
    const STATUS_SUCCSSES = 1;
    const STATUS_PAYD = 2;
    const STATUS_FAILED = 3;
    const STATUSES = [
        self::STATUS_SUCCSSES => 'Создан',
        self::STATUS_PAYD => 'Оплачен',
        self::STATUS_FAILED=> 'Отменен'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSuccssesTransactions(Builder $builder, $valueOne, $valueTwo)
    {
        $builder = where('status', self::STATUS_SUCCSSES)
            ->where('value', '>=', $valueOne)
            ->where('value', '<=', $valueTwo)
            ->oldest();
    }


}
