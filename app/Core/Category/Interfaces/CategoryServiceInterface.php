<?php

namespace App\Core\Category\Interfaces;

use App\Core\Category\Exceptions\CategoryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    /**
     * @param Request $request
     *
     * @return Collection
     */
    public function getCategories(Request $request): Collection;

    /**
     * @param Request $request
     *
     * @return bool
     *
     * @throws CategoryException
     *
     */
    public function create(Request $request): bool;

    /**
     * @param Request $request
     *
     * @param int $id
     *
     * @return bool
     *
     * @throws CategoryException
     */
    public function update(Request $request, int $id): bool;

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws CategoryException
     */
    public function delete(int $id): bool;
}