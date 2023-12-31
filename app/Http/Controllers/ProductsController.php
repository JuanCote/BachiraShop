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
use Illuminate\Support\Facades\Session;

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
        $user = $request->user();
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

        return view('products.main')->with([
            'categories' => $categories,
            'parent_category' => $parentCategory,
            'selected_category' => $selectedCategory,
            'subcategories' => $subcategories,
            'products' => $products,
            'products_count' => count($products),
            'order' => $orderParam,
            'user' => $user,
        ]);
    }

    public function productPage($productId, Request $request)
    {
        $categories = $this->categoryService->getAllCategories();
        $user = $request->user();
        $product = $this->productService->getProductById($productId);
        return view('products.productPage')->with([
            'product' => $product,
            'categories' => $categories,
            'user' => $user,
        ]);
    }

    public function cart(Request $request)
    {
        $categories = $this->categoryService->getAllCategories();
        Log::info(Session::all());
        $user = $request->user();
        return view('products.cart')->with([
            'categories' => $categories,
            'user' => $user,
        ]);
    }
}
