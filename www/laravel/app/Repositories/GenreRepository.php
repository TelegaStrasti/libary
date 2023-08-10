<?php

namespace App\Repositories;

use App\Models\Genre;
use App\Repositories\Interfaces\GenreRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class GenreRepository implements GenreRepositoryInterface
{
    /**
     * Пагинируемый список жанров
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedGenres():LengthAwarePaginator
    {
        return Genre::query()->paginate(10);
    }
}
