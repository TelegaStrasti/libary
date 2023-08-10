<?php

namespace App\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface GenreRepositoryInterface
{
    /**
     * Пагинируемый список жанров
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedGenres():LengthAwarePaginator;
}
