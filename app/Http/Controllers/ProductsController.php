<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function category($categoryTitle)
    {
        $categories = Category::all();

        $selectedCategory = null;

        foreach ($categories as $category) {
            if ($category['name'] === $categoryTitle) {
                $selectedCategory = $category;
                break;
            }
        }

        if ($selectedCategory == null) {
            return view('noCat');
        }

        $subcategories = [];
        $subcategoriesIds = [];
        $parentCategory = $selectedCategory;

        foreach ($categories as $category) {
            if ($category['parent_id'] == $selectedCategory['id']) {

                $subcategories[] = $category->toArray();
                $subcategoriesIds[] = $category['id'];
            } elseif ($category['id'] == $selectedCategory['parent_id']) {
                $parentCategory = $category;
            }
        }

        if ($parentCategory != $selectedCategory) {
            foreach ($categories as $category) {
                if ($category['parent_id'] == $parentCategory['id']) {
                    $subcategories[] = $category->toArray();
                }
            }
        }

        if ($parentCategory != $selectedCategory) {
            $products = Product::where('category_id', $selectedCategory['id'])->get();

        } else {
            $products = Product::whereIn('category_id', $subcategoriesIds)->get();
        }

        $productsCount = count($products);

        return view('products.main')->with([
            'categories' => $categories,
            'parent_category' => $parentCategory,
            'selected_category' => $selectedCategory,
            'subcategories' => $subcategories,
            'products' => $products,
            'products_count' => $productsCount
        ]);
    }
}