<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_id', 'name', 'slug', 'description', 'price', 'image_url', 'brand', 'gender'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function sizes()
    {
    return $this->hasMany(ProductSize::class);
    }
}
