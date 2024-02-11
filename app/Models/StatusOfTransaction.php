<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusOfTransaction extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function transactions(): hasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
