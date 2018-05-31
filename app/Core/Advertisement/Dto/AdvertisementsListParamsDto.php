<?php

namespace App\Core\Advertisement\Dto;

class AdvertisementsListParamsDto
{
    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var string
     */
    private $publishedAt;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $limit;

    /**
     * AdvertisementsListParamsDto constructor.
     *
     * @param int $categoryId
     * @param int $cityId
     * @param string $publishedAt
     * @param int $offset
     * @param int $limit
     */
    public function __construct($categoryId, $cityId, $publishedAt, $offset, $limit)
    {
        $this->categoryId = $categoryId;
        $this->cityId = $cityId;
        $this->publishedAt = $publishedAt;
        $this->offset = !empty($offset) ? $offset : 0;
        $this->limit = !empty($limit) ? $limit : 100;
    }

    /**
     * @return int
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @return int
     */
    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    /**
     * @return string
     */
    public function getPublishedAt(): ?string
    {
        return $this->publishedAt;
    }

    /**
     * @return int
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

}