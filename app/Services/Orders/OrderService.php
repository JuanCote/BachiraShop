<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Models\User;
use App\Services\Orders\Repositories\EloquentOrderRepository;
use App\Services\Products\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;


class OrderService
{
    private $orderRepository;

    private $productService;

    public function __construct(
        EloquentOrderRepository $orderRepository,
        ProductService $productService
    ) {
        $this->orderRepository = $orderRepository;
        $this->productService = $productService;
    }

    private function calculateOrderCost(array $products): float
    {
        $productIds = [];
        foreach ($products as $product) {
            $productIds[] = $product->id;
        }
        $productsDb = $this->productService->getProductsByIds($productIds);
        $totalCost = 0;
        foreach ($productsDb as $productDb) {
            $price = $productDb['price'];
            foreach ($products as $product) {
                if ($product->id == $productDb['id']) {
                    $price *= $product->count;
                }
            }
            $totalCost += $price;
        }
        return round($totalCost, 2);
    }

    public function createOrder(array $orderData): Order
    {
        $totalCost = $this->calculateOrderCost(json_decode($orderData['productsData']));
        $orderData['totalPrice'] = $totalCost;
        return $this->orderRepository->createOrder($orderData);
    }

    public function getOrdersByUser(User $user): Collection
    {
        return $this->orderRepository->getOrdersByUser($user);
    }

}
