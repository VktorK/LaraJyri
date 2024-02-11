<?php

namespace App\Models;

use App\Http\Resources\ProfileResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function profiles(): hasMany
    {
        return $this->hasMany(Profile::class);
    }
}
