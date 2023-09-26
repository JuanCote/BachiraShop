<?php

namespace App\Services\Products;

use App\Models\Category;
use App\Models\Product;
use App\Services\Products\Repositories\EloquentProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ProductService
{
    private $productRepository;

    public function __construct(
        EloquentProductRepository $productRepository,
    ) {
        $this->productRepository = $productRepository;
    }
    public function getProductsByCatsIds(array $categoriesIds, string $sortParam, string $orderParam): Collection
    {
        return $this->productRepository->getProductsByCatsIds($categoriesIds, $sortParam, $orderParam);
    }
    public function getProductsById(int $id, string $sortParam, string $orderParam): Collection
    {
        return $this->productRepository->getProductsById($id, $sortParam, $orderParam);
    }
    public function getProductById(int $id): Product
    {
        return $this->productRepository->getProductById($id);
    }
}