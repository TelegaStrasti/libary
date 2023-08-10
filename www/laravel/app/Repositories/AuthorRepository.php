<?php

namespace App\Repositories;

use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class AuthorRepository implements AuthorRepositoryInterface
{
    /**
     * Получить список авторов с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedAuthors():LengthAwarePaginator
    {
        return Author::query()->paginate(10);
    }
}
