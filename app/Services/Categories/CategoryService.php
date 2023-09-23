<?php

namespace App\Services\Categories;

use App\Models\Category;
use App\Services\Categories\Repositories\EloquentCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    private $categoryRepository;

    public function __construct(
        EloquentCategoryRepository $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
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

    public function getSubcategoriesAndParentCategory(Category $selectedCategory, Collection $categories): array
    {
        $subcategories = [];
        $subcategoriesIds = [];
        $parentCategory = $selectedCategory;

        foreach ($categories as $category) {
            if ($category['parent_id'] == $selectedCategory['id']) {

                $subcategories[] = $category->toArray();
                $subcategoriesIds[] = $category['id'];
            } elseif ($category['id'] == $selectedCategory['parent_id']) {
                $parentCategory = $category;
            }
        }

        if ($parentCategory != $selectedCategory) {
            foreach ($categories as $category) {
                if ($category['parent_id'] == $parentCategory['id']) {
                    $subcategories[] = $category->toArray();
                }
            }
        }
        return [
            'subcategories' => $subcategories,
            'subcategoriesIds' => $subcategoriesIds,
            'parentCategory' => $parentCategory
        ];
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAllCategories();
    }

}