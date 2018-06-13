<?php

namespace App\Http\Controllers\Advertisement;

use App\Core\Advertisement\Exceptions\AdvertisementSaveException;
use App\Core\Advertisement\Resources\AdvertisementCollection;
use App\Core\Advertisement\Services\AdvertisementService;
use App\Core\Image\Exceptions\ImageSaveException;
use App\Core\Image\Services\ImageService;
use App\Http\Requests\Advertisement\ListRequest;
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

    public function index(ListRequest $request)
    {
        $collection = $this->advertisementService->findByUserId($request);

        return new AdvertisementCollection($collection);
    }

    /**
     * @param StoreRequest $request
     * @param ImageService $imageService
     *
     * @return Response
     *
     * @throws AdvertisementSaveException
     * @throws ImageSaveException
     */
    public function store(StoreRequest $request, ImageService $imageService)
    {
        $this->advertisementService->create($request, $imageService);

        return response('', Response::HTTP_CREATED);
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

    /**
     * @param int $id
     *
     * @return Response
     *
     * @throws AdvertisementSaveException
     */
    public function publish(int $id)
    {
        $this->advertisementService->publish($id);

        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @throws AdvertisementSaveException
     */
    public function cancel(int $id)
    {
        $this->advertisementService->cancel($id);

        return response('', Response::HTTP_NO_CONTENT);
    }
}