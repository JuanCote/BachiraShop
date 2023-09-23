<?php

namespace App\Services\Products\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentProductRepository
{
    public function getProductsByCatsIds(array $categoriesIds, string $sortParam, string $orderParam): Collection
    {
        return Product::whereIn('category_id', $categoriesIds)
            ->orderBy($sortParam, $orderParam)
            ->get();
    }
    public function getProductsById(int $id, string $sortParam, string $orderParam): Collection
    {
        return Product::where('category_id', $id)
            ->orderBy($sortParam, $orderParam)
            ->get();
    }
}