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
}