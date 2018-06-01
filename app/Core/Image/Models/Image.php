<?php

namespace App\Core\Image\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 *
 * @package App\Core\Image\Models
 *
 * @property int $id
 * @property int $advertisement_id
 * @property string $url
 */
class Image extends Model
{
    public $timestamps = false;
    protected $table = 'images';
}