<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\TakeBookRepositoryInterface;

class TakeBookRepository implements TakeBookRepositoryInterface
{
    /**
     * Получить книгу по id
     *
     * @param $id
     * @return Book
     */
    public function getBook($id):Book
    {
        return Book::findOrFail($id);
    }
}
