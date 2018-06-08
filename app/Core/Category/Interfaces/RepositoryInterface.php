<?php

namespace App\Core\Category\Interfaces;

use App\Core\Category\Dto\CategoryDto;
use App\Core\Category\Exceptions\CategoryException;
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
    public function getCategories(CategoryDto $dto): Collection;

    /**
     * @param Category $category
     *
     * @return bool
     *
     * @throws CategoryException
     */
    public function save(Category $category): bool;

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws CategoryException
     */
    public function delete(int $id): bool;
}