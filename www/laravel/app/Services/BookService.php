<?php

namespace App\Services;

use App\DTO\BookDTO;
use App\Models\Book;
use App\Services\Interfaces\BookServiceInterface;

final class BookService implements BookServiceInterface
{
    /**
     * Добавить книгу
     *
     * @param BookDTO $bookDTO
     * @return Book
     */
    public function createBook(BookDTO $bookDTO):Book
    {
        $book = Book::create([
            'title' => $bookDTO->getTitle(),
            'quantity' => $bookDTO->getQuantity() ?? 0,
        ]);

        $book->authors()->attach($bookDTO->getAuthors());

        $book->genres()->attach($bookDTO->getGenres());

        return $book;
    }

    /**
     * Изменить книгу
     *
     * @param BookDTO $bookDTO
     * @param Book $book
     * @return Book
     */
    public function updateBook(BookDTO $bookDTO, Book $book): Book
    {
        $book->update([
            'title' => $bookDTO->getTitle(),
            'quantity' => $bookDTO->getQuantity() ?? 0,
        ]);

        $book->authors()->sync($bookDTO->getAuthors());

        $book->genres()->sync($bookDTO->getGenres());

        return $book;
    }

    /**
     * Удаление книги
     *
     * @param Book $book
     * @return void
     */
    public function deleteBook(Book $book): void
    {
        $book->authors()->detach();
        $book->genres()->detach();
        $book->delete();
    }
}
