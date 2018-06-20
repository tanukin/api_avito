<?php

namespace App\Http\Controllers\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Core\City\Services\CityService;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\ListRequest;
use App\Core\City\Resources\CityCollection;
use App\Core\City\Exceptions\CityExistException;
use App\Core\City\Exceptions\CityDeleteException;

/**
 * Class CityController
 * @package App\Http\Controllers\City
 */
class CityController extends Controller
{
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * CityController constructor.
     * @param CityService $cityService
     *
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * @param ListRequest $request
     * @return CityCollection
     */
    public function index(ListRequest $request)
    {
        $cities = $this->cityService->getCities($request);

        return new CityCollection($cities);
    }

    /**
     * @param StoreRequest $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $this->cityService->create($request);

        return response('', Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        try{
            $this->cityService->delete($id);
        } catch (CityExistException $e) {
            return response ('', Response::HTTP_NOT_FOUND);
        }

        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @param StoreRequest $request
     * @param int $id
     * @return Response
     */
    public function update(StoreRequest $request, int $id)
    {
        try{
            $this->cityService->update($request, $id);
        } catch (CityExistException $e) {
            return response ('', Response::HTTP_NOT_FOUND);
        }

        return response('', Response::HTTP_NO_CONTENT);
    }
}
