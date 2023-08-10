<?php

namespace App\Repositories\Interfaces;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepositoryInterface
{
    /**
     * Пагинируемый список книг
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedBooks():LengthAwarePaginator;

}
