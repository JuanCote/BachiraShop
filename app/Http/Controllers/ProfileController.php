<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryService;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    public function profileOrders()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $categories = $this->categoryService->getAllCategories();
        $orders = [];
        return view('profile.profileOrders')->with([
            'categories' => $categories,
            'orders' => $orders,
        ]);
    }
    public function profileAddress()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $categories = $this->categoryService->getAllCategories();
        $orders = [];
        return view('profile.profileAddress')->with([
            'categories' => $categories,
            'orders' => $orders,
        ]);
    }
}
