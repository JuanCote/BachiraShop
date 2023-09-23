<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\Categories\CategoryService;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    private $categoryService;
    private $productService;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function products(Request $request, $categoryTitle)
    {

        $categories = $this->categoryService->getAllCategories();

        $selectedCategory = $this->categoryService->getCategoryByName($categoryTitle, $categories);

        if ($selectedCategory == null) {
            return view('noCat');
        }

        [
            'subcategories' => $subcategories,
            'subcategoriesIds' => $subcategoriesIds,
            'parentCategory' => $parentCategory
        ] = $this->categoryService->getSubcategoriesAndParentCategory($selectedCategory, $categories);

        $request->validate([
            'order' => 'nullable|in:asc,desc',
            'sort' => 'nullable|in:price',
        ]);

        $sortParam = $request->query('sort', 'price');
        $orderParam = $request->query('order', 'desc');

        if ($parentCategory != $selectedCategory) {
            $products = $this->productService->getProductsById($selectedCategory->id, $sortParam, $orderParam);

        } else {
            $products = $this->productService->getProductsByCatsIds($subcategoriesIds, $sortParam, $orderParam);
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