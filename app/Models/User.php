<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    protected $guarded = false;

    public function promocodes() : hasMany
    {
        return $this->hasMany(Promocode::class);
    }

    public function transactions() : hasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function orders() : hasMany
    {
        return $this->hasMany(Order::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function profile(): hasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected function getIsAdminAttribute()
    {
        return $this->roles->pluck('title')->contains('admin');
    }
}

