<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * If you use a separate sub_categories table and SubCategory model.
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    /**
     * Convenience: get all products under this category via subcategories.
     * Use $category->products to get a collection of all products in all subcategories.
     */
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            SubCategory::class,
            'category_id', // Foreign key on sub_categories table...
            'sub_category_id', // Foreign key on products table...
            'id', // Local key on categories table...
            'id'  // Local key on sub_categories table...
        );
    }
}