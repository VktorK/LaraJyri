<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = false;


    protected $table = 'category_of_products';


    public function products() : hasMany
    {
        return $this->hasMany(Product::class);
    }
}
