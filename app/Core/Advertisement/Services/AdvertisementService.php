<?php

namespace App\Core\Advertisement\Services;

use App\Core\Advertisement\Dto\AdvertisementsListParamsDto;
use App\Core\Advertisement\Models\Advertisement;
use App\Core\Advertisement\Repositories\AdvertisementRepository;
use App\Core\Image\Services\ImageService;
use App\Http\Requests\Advertisement\ListRequest;
use App\Http\Requests\Advertisement\StoreRequest;

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
     * @throws \App\Core\Advertisement\Exceptions\AdvertisementSaveException
     * @throws \App\Core\Image\Exceptions\ImageSaveException
     */
    public function create(StoreRequest $request, ImageService $imageService): Advertisement
    {
        $advertisement = new Advertisement();
        $advertisement->title = $request['title'];
        $advertisement->price = $request['price'];
        $advertisement->description = $request['description'];
        $advertisement->category_id = $request['categoryId'];
        $advertisement->city_id = $request['cityId'];
        $advertisement->user_id = $request['userId'];
        $advertisement->address = $request['address'];
        $advertisement->phone = $request['phone'];

        $this->advertisementRepository->save($advertisement);

        if (!empty($request['images']) && is_array($request['images'])) {
            foreach ($request['images'] as $url) {
                $imageService->create($advertisement->id, $url);
            }
        }

        return $advertisement;
    }

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
}