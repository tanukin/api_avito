<?php

namespace App\Core\Advertisement\Services;

use App\Core\Advertisement\Repositories\AdvertisementRepository;

class AdvertisementService
{
    /**
     * @var AdvertisementRepository
     */
    private $advertisementRepository;

    public function __construct(AdvertisementRepository $advertisementRepository)
    {
        $this->advertisementRepository = $advertisementRepository;
    }

    public function create($data)
    {
    }
}