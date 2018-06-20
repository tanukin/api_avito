<?php

namespace App\Core\City\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\City\Models
 *
 * @property int $id
 * @property string $title
 */

class City extends Model
{
    public $timestamps = false;
    protected $table = 'cities';
}