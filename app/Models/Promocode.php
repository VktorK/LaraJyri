<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'date_of_end' => 'date'
    ];

    protected $guarded = false;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
