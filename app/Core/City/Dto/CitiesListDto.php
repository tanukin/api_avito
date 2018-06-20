<?php

namespace App\Core\City\Dto;

class CitiesListDto
{
    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $limit;

    /**
     * CitiesListDto constructor.
     *
     * @param int $offset
     * @param int $limit
     */
    public function __construct($offset, $limit)
    {
        $this->offset = !empty($offset) ? $offset : 0;
        $this->limit = !empty($limit) ? $limit : 100;
    }

    /**
     * @return int
     */
    public function getOffset(): int
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