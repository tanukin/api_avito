<?php

namespace App\Core\Category\Services;

use App\Core\Category\Dto\CategoryDto;
use App\Core\Category\Interfaces\CategoryServiceInterface;
use App\Core\Category\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getCategories(Request $request): Collection
    {
        $dto = new CategoryDto();
        $dto->setOffset($request->get('offset'));
        $dto->setLimit($request->get('limit'));

        return  $this->repository->getCategories($dto);
    }

    public function update(Request $request, int $id): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}