<?php

namespace App\Core\Advertisement\Repositories;

use App\Core\Advertisement\Exceptions\AdvertisementSaveException;
use App\Core\Advertisement\Models\Advertisement;

class AdvertisementRepository
{
    /**
     * @param Advertisement $advertisement
     *
     * @return Advertisement
     *
     * @throws AdvertisementSaveException
     */
    public function save(Advertisement $advertisement): Advertisement
    {
        if (!$advertisement->save()) {
            throw new AdvertisementSaveException('Advertisement saving error');
        }

        return $advertisement;
    }

}