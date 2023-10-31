<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryService;
use App\Services\Orders\OrderService;
use App\Services\Products\ProductService;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    private $userService;
    private $categoryService;
    private $productService;

    private $orderService;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService,
        UserService $userService,
        OrderService $orderService,
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function checkout(Request $request)
    {
        $categories = $this->categoryService->getAllCategories();
        $user = $request->user();
        return view('checkout.checkout')->with([
            'categories' => $categories,
            'user' => $user,
        ]);
    }

    public function createOrder(Request $request)
    {
        $user = $request->user();
        $receivedOrderData = $request->all();
        $receivedOrderData['user'] = $user;
        $this->orderService->createOrder($receivedOrderData);
        return redirect('/profile/orders')->with([
            'message' => 'Order succesfuly created'
        ]);
    }
}
