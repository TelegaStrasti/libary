<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

final class BookRepository implements BookRepositoryInterface
{
    /**
     * Пагинируемый список книг
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedBooks(): LengthAwarePaginator
    {
        return Book::with('authors', 'genres')->paginate(10);
    }
}
