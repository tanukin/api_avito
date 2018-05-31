<?php

namespace App\Core\Advertisement\Models;

use App\Core\Image\Models\Image;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advertisement
 *
 * @package App\Core\Advertisement\Models
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string $description
 * @property int $category_id
 * @property int $city_id
 * @property string $user_id
 * @property string $address
 * @property string $phone
 * @property string $publish_date
 */
class Advertisement extends Model
{
    public $timestamps = false;
    protected $table = 'advertisements';

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}