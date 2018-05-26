<?php

namespace App\Http\Controllers\Advertisement;

use App\Core\Advertisement\Exceptions\AdvertisementSaveException;
use App\Core\Advertisement\Services\AdvertisementService;
use App\Http\Requests\Advertisement\StoreRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class AdvertisementController extends BaseController
{
    use ValidatesRequests;

    /**
     * @var AdvertisementService
     */
    private $advertisementService;

    /**
     * AdvertisementController constructor.
     *
     * @param AdvertisementService $advertisementService
     */
    public function __construct(AdvertisementService $advertisementService)
    {
        $this->advertisementService = $advertisementService;
    }

    public function index()
    {
        // @TODO
    }

    /**
     * @param StoreRequest $request
     *
     * @return $this
     */
    public function store(StoreRequest $request)
    {
        try {
            $this->advertisementService->create($request);

            return response('', Response::HTTP_CREATED);
        } catch (AdvertisementSaveException $e) {
            return response(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Throwable $e) {
            return response(['message' => 'Internal server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        // @TODO
    }

    public function update($id)
    {
        // @TODO
    }

    public function destroy($id)
    {
        // @TODO
    }
}