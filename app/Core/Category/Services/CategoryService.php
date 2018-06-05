<?php

namespace App\Core\Category\Services;

use App\Core\Category\Dto\CategoryDto;
use App\Core\Category\Interfaces\CategoryServiceInterface;
use App\Core\Category\Interfaces\RepositoryInterface;
use App\Core\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * CategoryService constructor.
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories(Request $request): Collection
    {
        $dto = new CategoryDto();
        $dto->setOffset($request->get('offset'));
        $dto->setLimit($request->get('limit'));

        return $this->repository->getCategories($dto);
    }

    /**
     * {@inheritdoc}
     */
    public function create(Request $request): bool
    {
        $category = new Category();
        $category = $this->setProperties($category, $request);

        return $this->repository->save($category);
    }

    /**
     * {@inheritdoc}
     */
    public function update(Request $request, int $id): bool
    {
        $category = $this->repository->getCategory($id);
        $category = $this->setProperties($category, $request);

        return $this->repository->save($category);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(int $id): bool
    {
        $category = $this->repository->getCategory($id);

        return $this->repository->delete($category);
    }

    /**
     * @param Category $category
     *
     * @param Request $request
     *
     * @return Category
     */
    private function setProperties(Category $category, Request $request): Category
    {
        $category->title = $request->get('title');
        $category->parent_id = $request->get('parentId');
        $category->lifetime = $request->get('lifetime');

        return $category;
    }
}