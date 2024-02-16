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

class User extends Authenticatable
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





}

