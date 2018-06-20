<?php

namespace App\Core\City\Services;

use App\Core\City\Repositories\CityRepository;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\ListRequest;
use App\Core\City\Exceptions\CitySaveException;
use App\Core\City\Exceptions\CityDeleteException;
use App\Core\City\Dto\CitiesListDto;
use App\Core\City\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * CityService constructor.
     *
     * @param CityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @param StoreRequest $request
     *
     * @return City
     *
     * @throws CitySaveException
     */
    public function create(StoreRequest $request): City
    {
        $city = new City();
        $city->title = $request->get('title');

        $this->cityRepository->save($city);

        return $city;
    }

    /**
     * @param StoreRequest $request
     * @param int $id
     * @return City
     * @throws CitySaveException
     * @throws \App\Core\City\Exceptions\CityExistException
     */
    public function update(StoreRequest $request, int $id): City
    {
        $city = $this->cityRepository->getCity($id);
        $city->title = $request->get('title');

        return $this->cityRepository->save($city);
    }

    /**
     * @param ListRequest $request
     * @return Collection
     */
    public function getCities(ListRequest $request):Collection
    {
        $citiesDto = new CitiesListDto(
            $request->get('offset'),
            $request->get('limit')
        );

        $cities = $this->cityRepository->get($citiesDto);

        return $cities;

    }

    /**
     * @param int $id
     * @return bool
     * @throws CityDeleteException
     * @throws \App\Core\City\Exceptions\CityExistException
     */
    public function delete(int $id):bool
    {
        return $this->cityRepository->delete($id);
    }

}