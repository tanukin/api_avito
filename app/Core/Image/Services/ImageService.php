<?php

namespace App\Core\Image\Services;

use App\Core\Image\Models\Image;
use App\Core\Image\Repositories\ImageRepository;
use App\Core\Image\Exceptions\ImageSaveException;

class ImageService
{
    /**
     * @var ImageRepository
     */
    private $imageRepository;

    /**
     * ImageService constructor.
     *
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param int $advertisementId
     * @param string $url
     *
     * @return Image
     *
     * @throws ImageSaveException
     */
    public function create(int $advertisementId, string $url): Image
    {
        $image = new Image();
        $image->advertisement_id = $advertisementId;
        $image->url = $url;

        return $this->imageRepository->save($image);
    }
}