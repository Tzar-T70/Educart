<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load('subCategories.products');
        return view('categories.show', compact('category'));
    }

public function showSubCategory(Category $category, SubCategory $subCategory, Request $request)
{
    $sort = $request->query('sort');
    $search = $request->query('search');

    $productsQuery = $subCategory->products();

    if ($search) {
        $productsQuery->where('name', 'like', '%' . $search . '%');
    }

    if ($sort === 'price_asc') {
        $productsQuery->orderBy('price', 'asc');
    }

    $products = $productsQuery->get();

    return view('subcategories.show', compact('category', 'subCategory', 'products'));
}
}
