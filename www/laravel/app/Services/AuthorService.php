<?php

namespace App\Services;

use App\DTO\AuthorDTO;
use App\Models\Author;
use App\Services\Interfaces\AuthorServiceInterface;

final class AuthorService implements AuthorServiceInterface
{
    /**
     * Создание нового автора
     *
     * @param AuthorDTO $authorDTO
     * @return Author
     */
    public function createAuthor(AuthorDTO $authorDTO):Author
    {
        return Author::create([
            'name' => $authorDTO->getName()
        ]);
    }

    /**
     * Редактирование автора
     *
     * @param AuthorDTO $authorDTO
     * @param Author $author
     * @return Author
     */
    public function updateAuthor(AuthorDTO $authorDTO, Author $author): Author
    {
        $author->update([
            'name' => $authorDTO->getName(),
        ]);

        return $author;
    }

    /**
     * Удаление автора
     *
     * @param Author $author
     * @return void
     */
    public function deleteAuthor(Author $author):void
    {
        $author->delete();
    }
}
