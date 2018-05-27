<?php

namespace App\Core\Image\Repositories;

use App\Core\Image\Exceptions\ImageSaveException;
use App\Core\Image\Models\Image;

class ImageRepository
{
    public function save(Image $image): Image
    {
        if (!$image->save()) {
            throw new ImageSaveException('Image link saving error');
        }

        return $image;
    }

}