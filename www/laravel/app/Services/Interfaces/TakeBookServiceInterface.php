<?php

namespace App\Services\Interfaces;

use App\DTO\TakeBookDTO;
use App\Models\Book;

interface TakeBookServiceInterface
{
    /**
     * Взятие книги из библиотеки
     *
     * @param TakeBookDTO $takeBookDTO
     * @param $user
     * @param Book $book
     * @return array
     */
    public function takeBook(TakeBookDTO $takeBookDTO, $user, Book $book):array;

    /**
     * Возврат книги
     *
     * @param $user
     * @param Book $book
     * @return array
     */
    public function returnBook($user, Book $book): array;
}
