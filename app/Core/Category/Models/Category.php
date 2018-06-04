<?php

namespace App\Core\Category\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App\Core\Category\Models
 *
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property int $lifetime
 */
class Category extends Model
{
    public $timestamps = false;
    protected $table = "categories";

    protected $fillable = ['title', 'parent_id', 'lifetime'];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}