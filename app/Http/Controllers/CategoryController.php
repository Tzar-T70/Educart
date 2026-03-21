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

    if ($sort === 'created_desc') {
        $productsQuery->orderBy('created_at', 'desc');
    }

    if ($sort === 'created_asc') {
        $productsQuery->orderBy('created_at', 'asc');
    }

    if ($sort === 'name_asc') {
        $productsQuery->orderBy('name', 'asc');
    }

    if ($sort === 'name_desc') {
        $productsQuery->orderBy('name', 'desc');
    }

    if ($sort === 'popular') {
        $productsQuery->orderBy('created_at', 'desc');
    }

    $products = $productsQuery->get();

    return view('subcategories.show', compact('category', 'subCategory', 'products'));
}
}