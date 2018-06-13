<?php

namespace App\Core\Advertisement\Repositories;

use App\Core\Advertisement\Dto\AdvertisementsListParamsDto;
use App\Core\Advertisement\Exceptions\AdvertisementSaveException;
use App\Core\Advertisement\Models\Advertisement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param int $userId
     * @param AdvertisementsListParamsDto $dto
     *
     * @return Collection
     */
    public function findByUserId(int $userId, AdvertisementsListParamsDto $dto): Collection
    {
        $builder = Advertisement::where(['user_id' => $userId])
            ->with('images');
        $builder = $this->addListAdditionalParams($dto, $builder);

        return $builder->get();
    }

    /**
     * @param AdvertisementsListParamsDto $dto
     * @param Builder $builder
     *
     * @return Builder
     */
    private function addListAdditionalParams(AdvertisementsListParamsDto $dto, Builder $builder): Builder
    {
        if (!empty($categoryId = $dto->getCategoryId())) {
            $builder->where(['category_id' => $categoryId]);
        }

        if (!empty($cityId = $dto->getCityId())) {
            $builder->where(['city_id' => $cityId]);
        }

        if (!empty($publishedAt = $dto->getPublishedAt())) {
            $builder->where(['publish_date' => $publishedAt]);
        }

        $builder->offset($dto->getOffset())
            ->limit($dto->getLimit());

        return $builder;
    }

    /**
     * @param int $id
     *
     * @return Advertisement
     */
    public function getAdvertisement(int $id): Advertisement
    {
        return Advertisement::findOrFail($id);
    }
}