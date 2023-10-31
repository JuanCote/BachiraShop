<?php

namespace App\Services\Orders\Repositories;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentOrderRepository
{
    public function createOrder(array $orderData): Order
    {
        $order = Order::create([
            'user_id' => $orderData['user']->id,
            'products' => $orderData['productsData'],
            'total_price' => $orderData['totalPrice'],
            'firstname' => $orderData['firstname'],
            'surname' => $orderData['surname'],
            'street' => $orderData['street'],
            'house' => $orderData['house'],
            'postal_code' => $orderData['postal'],
            'city' => $orderData['city'],
            'phone_number' => $orderData['phone_number']
        ]);
        return $order;
    }

    public function getOrdersByUser(User $user): Collection
    {
        $orders = Order::where('user_id', $user->id)->latest('created_at')->get();
        return $orders;
    }
}
