<?php

namespace App\Core\Advertisement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Advertisement
 *
 * @package App\Core\Advertisement\Models
 *
 * @property $title
 * @property $price
 * @property $description
 * @property $category_id
 * @property $city_id
 * @property $user_id
 * @property $address
 * @property $phone
 * @property $publish_date
 */
class Advertisement extends Model
{
    public $timestamps = false;
    protected $table = 'advertisements';

}