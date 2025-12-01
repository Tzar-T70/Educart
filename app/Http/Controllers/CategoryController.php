<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load(['subCategories.products' => function($query) {
            $query->take(4);
        }]);
        return view('categories.show', compact('category'));
    }

    public function showSubCategory(Category $category, SubCategory $subCategory)
    {
        $subCategory->load('products');
        return view('subcategories.show', compact('category', 'subCategory'));
    }
}
