<?php

namespace App\Core\Category\Interfaces;

use App\Core\Category\Dto\CategoryDto;
use App\Core\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Category
     */
    public function getCategory(int $id): Category;

    /**
     * @param CategoryDto $dto
     *
     * @return Collection
     */
    public function getCategories(CategoryDto $dto):Collection;

    public function save(Category $category): bool;

    public function delete(Category $category): bool;
}