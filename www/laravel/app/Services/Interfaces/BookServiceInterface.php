<?php

namespace App\Services\Interfaces;

use App\DTO\BookDTO;
use App\Models\Book;

interface BookServiceInterface
{
    /**
     * Добавить книгу
     *
     * @param BookDTO $bookDTO
     * @return Book
     */
    public function createBook(BookDTO $bookDTO): Book;

    /**
     * Изменить книгу
     *
     * @param BookDTO $bookDTO
     * @param Book $book
     * @return Book
     */
    public function updateBook(BookDTO $bookDTO, Book $book): Book;

    /**
     * Удаление книги
     *
     * @param Book $book
     * @return void
     */
    public function deleteBook(Book $book): void;

}
