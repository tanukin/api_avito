<?php

namespace App\Core\Category\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function getCategories(Request $request): Collection;
    public function update(Request $request, int $id): bool;
    public function delete(int $id): bool;
}