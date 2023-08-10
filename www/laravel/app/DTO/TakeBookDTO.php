<?php

namespace App\DTO;

use App\Models\Book;

class TakeBookDTO
{
    public function __construct(
        readonly public string $return_date,
    )
    {}

    /**
     * Получить дату возврата
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->return_date;
    }
}
