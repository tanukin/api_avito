<?php

namespace App\Core\Category\Repository;

use App\Core\Category\Dto\CategoryDto;
use App\Core\Category\Interfaces\RepositoryInterface;
use App\Core\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements RepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCategory(int $id): Category
    {
        return Category::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories(CategoryDto $dto): Collection
    {
        $build = Category::on()
            ->limit($dto->getLimit())
            ->offset($dto->getOffset());

        return $build->get();
    }

    public function save(Category $category): bool
    {
        // TODO: Implement save() method.
    }

    public function delete(Category $category): bool
    {
        // TODO: Implement delete() method.
    }
}