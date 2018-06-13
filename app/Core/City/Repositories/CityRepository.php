<?php

namespace App\Core\City\Repositories;

use App\Core\City\Exceptions\CitySaveException;
use App\Core\City\Exceptions\CityDeleteException;
use App\Core\City\Exceptions\CityExistException;
use App\Core\City\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Core\City\Dto\CitiesListDto;
use Mockery\CountValidator\Exception;

/**
 * Class CityRepository
 * @package App\Core\City\Repositories
 */
class CityRepository
{
    /**
     * @param City $city
     *
     * @return City
     *
     * @throws CitySaveException
     */
    public function save(City $city): City
    {
        if (!$city->save()) {
            throw new CitySaveException('City saving error');
        }

        return $city;
    }

    /**
     * @param CitiesListDto $cityDto
     *
     * @return mixed
     */
    public function get(CitiesListDto $cityDto): Collection
    {
        $builder = City::on()
            ->offset($cityDto->getOffset())
            ->limit($cityDto->getLimit());

        return $builder->get();
    }

    /**
     * @param $id
     *
     * @return City
     *
     * @throws CityExistException
     */
    public function getCity($id): City
    {
        $city = City::find($id);
        if (!$city) {
            throw new CityExistException (sprintf("City with ID=%s doesn't exists", $id));
        }
        
        return $city;
    }

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws CityDeleteException
     *
     * @throws CityExistException
     */
    public function delete(int $id):bool
    {
        if (!City::find($id)) {
            throw new CityExistException (sprintf("City with ID=%s doesn't exists", $id));
        }

        if (!City::destroy($id)) {
            throw new CityDeleteException ('City delete error');
        }

        return true;
    }
   
}