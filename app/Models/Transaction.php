<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = false;



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

    public function scopeSucTransactions(Builder $builder, $valueOne, $valueTwo): Builder
    {
        return $builder->where('status', self::STATUS_SUCCSSES)
            ->where('value', '>=', $valueOne)
            ->where('value', '<=', $valueTwo)
            ->oldest();
    }




}
