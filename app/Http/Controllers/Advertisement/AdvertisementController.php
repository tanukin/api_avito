<?php

namespace App\Http\Controllers\Advertisement;

use App\Core\Advertisement\Exceptions\AdvertisementSaveException;
use App\Core\Advertisement\Resources\AdvertisementCollection;
use App\Core\Advertisement\Services\AdvertisementService;
use App\Core\Image\Exceptions\ImageSaveException;
use App\Core\Image\Services\ImageService;
use App\Http\Requests\Advertisement\ListRequest;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Requests\Advertisement\UpdateRequest;
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
        $advertisement =$this->advertisementService->create($request, $imageService);

        return response($advertisement, Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show(int $id)
    {
        $advertisement = $this->advertisementService->getById($id);

        return response($advertisement);
    }

    /**
     * @param int           $id
     * @param UpdateRequest $updateRequest
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *
     * @throws AdvertisementSaveException
     */
    public function update(int $id, UpdateRequest $updateRequest)
    {
        $this->advertisementService->update($id, $updateRequest);

        return response('', Response::HTTP_OK);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *
     * @throws \App\Core\Advertisement\Exceptions\AdvertisementDeleteException
     */
    public function destroy(int $id)
    {
        $this->advertisementService->delete($id);

        return response('', Response::HTTP_OK);
    }
}