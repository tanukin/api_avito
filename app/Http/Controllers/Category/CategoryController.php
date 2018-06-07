<?php

namespace App\Http\Controllers\Category;

use App\Core\Category\Exceptions\CategoryException;
use App\Core\Category\Interfaces\CategoryServiceInterface;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\PaginationRequest;
use App\Http\Resources\ResponseCollection;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    use ValidatesRequests;

    /**
     * @var CategoryServiceInterface
     */
    private $service;

    public function __construct(CategoryServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param PaginationRequest $request
     *
     * @return ResponseCollection
     */
    public function index(PaginationRequest $request)
    {
        $categories = $this->service->getCategories($request);

        return new ResponseCollection($categories);
    }

    /**
     * @param StoreRequest $request
     *
     * @return Response
     *
     * @throws CategoryException
     */
    public function store(StoreRequest $request)
    {
        $this->service->create($request);

        return response('', Response::HTTP_CREATED);
    }

    /**
     * @param StoreRequest $request
     * @param int $id
     *
     * @return Response
     *
     * @throws CategoryException
     */
    public function update(StoreRequest $request, int $id)
    {
        $this->service->update($request, $id);

        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @throws CategoryException
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response('', Response::HTTP_NO_CONTENT);
    }
}
