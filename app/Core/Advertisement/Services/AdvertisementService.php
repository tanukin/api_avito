<?php

namespace App\Core\Advertisement\Services;

use App\Core\Advertisement\Dto\AdvertisementsListParamsDto;
use App\Core\Advertisement\Models\Advertisement;
use App\Core\Advertisement\Repositories\AdvertisementRepository;
use App\Core\Image\Services\ImageService;
use App\Http\Requests\Advertisement\AdvertisementRequestInterface;
use App\Http\Requests\Advertisement\ListRequest;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Core\Advertisement\Exceptions\AdvertisementSaveException;
use App\Core\Image\Exceptions\ImageSaveException;
use App\Http\Requests\Advertisement\UpdateRequest;
use Illuminate\Support\Carbon;

class AdvertisementService
{
    /**
     * @var AdvertisementRepository
     */
    private $advertisementRepository;

    /**
     * AdvertisementService constructor.
     *
     * @param AdvertisementRepository $advertisementRepository
     */
    public function __construct(AdvertisementRepository $advertisementRepository)
    {
        $this->advertisementRepository = $advertisementRepository;
    }

    /**
     * @param StoreRequest $request
     * @param ImageService $imageService
     *
     * @return Advertisement
     *
     * @throws AdvertisementSaveException
     * @throws ImageSaveException
     */
    public function create(StoreRequest $request, ImageService $imageService): Advertisement
    {
        $advertisement = new Advertisement();
        $advertisement = $this->mapPropertiesToModel($request, $advertisement);

        $this->advertisementRepository->save($advertisement);

        if ($request->has('images')) {
            foreach ($request['images'] as $url) {
                $imageService->create($advertisement->id, $url);
            }
        }

        return $advertisement;
    }

    /**
     * @param ListRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByUserId(ListRequest $request)
    {
        $listParamsDto = new AdvertisementsListParamsDto(
            $request['categoryId'],
            $request['cityId'],
            $request['publishedAt'],
            $request['offset'],
            $request['limit']
        );

        return $this->advertisementRepository->findByUserId($request['userId'], $listParamsDto);
    }

    /**
     * @param int $id
     *
     * @return Advertisement
     */
    public function getById(int $id): Advertisement
    {
        return $this->advertisementRepository->getWithImages($id);
    }

    /**
     * @param AdvertisementRequestInterface $request
     * @param Advertisement                 $model
     *
     * @return Advertisement
     */
    protected function mapPropertiesToModel(
        AdvertisementRequestInterface $request,
        Advertisement $model
    ): Advertisement {
        $model->title = $request->get('title', $model->title);
        $model->price = $request->get('price', $model->price);
        $model->description = $request->get('description', $model->description);
        $model->category_id = $request->get('categoryId', $model->category_id);
        $model->city_id = $request->get('cityId', $model->city_id);
        $model->user_id = $request->get('userId', $model->user_id);
        $model->address = $request->get('address', $model->address);
        $model->phone = $request->get('phone', $model->phone);

        return $model;
    }

    /**
     * @param int           $id
     * @param UpdateRequest $updateRequest
     *
     * @throws AdvertisementSaveException
     */
    public function update(int $id, UpdateRequest $updateRequest)
    {
        $advertisement = $this->advertisementRepository->getAdvertisement($id);
        $advertisement = $this->mapPropertiesToModel($updateRequest, $advertisement);

        $this->advertisementRepository->save($advertisement);
    }

    /**
     * @param int $id
     *
     * @throws \App\Core\Advertisement\Exceptions\AdvertisementDeleteException
     */
    public function delete(int $id)
    {
        $this->advertisementRepository->delete($id);
    }

    /**
     * @param int $id
     *
     * @throws AdvertisementSaveException
     */
    public function publish(int $id): void
    {
        $advertisement = $this->advertisementRepository->getAdvertisement($id);
        $advertisement->published = true;
        $advertisement->publish_date = Carbon::now()->toDateTimeString();

        $this->advertisementRepository->save($advertisement);
    }

    /**
     * @param int $id
     *
     * @throws AdvertisementSaveException
     */
    public function cancel(int $id): void
    {
        $advertisement = $this->advertisementRepository->getAdvertisement($id);
        $advertisement->cancelled = true;
        $advertisement->cancel_date = Carbon::now()->toDateTimeString();

        $this->advertisementRepository->save($advertisement);
    }
}