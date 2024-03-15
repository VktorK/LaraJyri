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

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function promocode(): HasOne
    {
        return $this->hasOne(Promocode::class);
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

    public function productsInCart(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->wherePivot('order_id',null);
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

    public function updateProductQty(Order $order): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('qty')->wherePivot('order_id',$order->id);
    }

    public function destroyOrder(Order $order): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('qty')->wherePivot('order_id',$order->id);
    }

    public function destroyProduct(Order $order): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('qty')->wherePivot('order_id',$order->id);
    }
}

