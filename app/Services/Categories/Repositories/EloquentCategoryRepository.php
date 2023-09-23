<?php

namespace App\Services\Categories\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentCategoryRepository
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }
    public function getCategoryByName(string $categoryName, Collection $categories): ?Category
    {
        foreach ($categories as $category) {
            if ($category->name === $categoryName) {
                return $category;
            }
        }
        return null;
    }
}