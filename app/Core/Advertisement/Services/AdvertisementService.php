<?php

namespace App\Core\Advertisement\Services;

use App\Core\Advertisement\Models\Advertisement;
use App\Core\Advertisement\Repositories\AdvertisementRepository;
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
     *
     * @throws \App\Core\Advertisement\Exceptions\AdvertisementSaveException
     */
    public function create(StoreRequest $request)
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
    }
}