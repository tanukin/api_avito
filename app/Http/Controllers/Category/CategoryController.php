<?php

namespace App\Http\Controllers\Category;

use App\Core\Category\Interfaces\CategoryServiceInterface;
use App\Core\Category\Resources\CategoryCollection;
use App\Http\Requests\PaginationRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    use ValidatesRequests;

    /**
     * @var CategoryServiceInterface
     */
    private $service;

    /**
     * CategoryController constructor.
     *
     * @param CategoryServiceInterface $service
     */
    public function __construct(CategoryServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(PaginationRequest $request)
    {
        $categories = $this->service->getCategories($request);

        return new CategoryCollection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
