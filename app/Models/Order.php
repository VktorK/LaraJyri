<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Order extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function executors() : hasMany
    {
        return $this->hasMany(Executor::class);
    }

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }


}
