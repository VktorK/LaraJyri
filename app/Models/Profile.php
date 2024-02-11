<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function gender(): belongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function transactions(): hasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

}
