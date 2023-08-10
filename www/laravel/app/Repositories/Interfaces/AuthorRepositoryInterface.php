<?php

namespace App\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface AuthorRepositoryInterface
{
    /**
     * Получить список авторов с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedAuthors():LengthAwarePaginator;

}
