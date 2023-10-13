<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryService;
use App\Services\Products\ProductService;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    private $userService;
    private $categoryService;
    private $productService;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService,
        UserService $userService
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->userService = $userService;
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
    public function profileAddress(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = $request->user();
        $categories = $this->categoryService->getAllCategories();

        $message = session('message', null);

        return view('profile.profileAddress')->with([
            'categories' => $categories,
            'user' => $user,
            'message' => $message
        ]);
    }

    public function editAddress(Request $request)
    {
        $data = $request->all();
        $user = $request->user();
        $this->userService->updateAddress($user, $data);
        return redirect()->route('profile.address')->with([
            'message' => 'Address updated successfully'
        ]);
    }
}