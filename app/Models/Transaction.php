<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function statusOfTransaction(): belongsTo
    {
        return $this->belongsTo(StatusOfTransaction::class);
    }

    public function profile(): belongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
