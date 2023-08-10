<?php

namespace App\Repositories\Interfaces;

use App\Models\Book;

interface TakeBookRepositoryInterface
{
    /**
     * Получить книгу по id
     *
     * @param $id
     * @return Book
     */
    public function getBook($id):Book;
}
