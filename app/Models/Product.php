<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'stores_id');
    }
    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class, 'products_id');
    }
}
