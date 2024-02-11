<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promocode extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
