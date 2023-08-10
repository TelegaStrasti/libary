<?php

namespace App\Services\Interfaces;

use App\DTO\AuthorDTO;
use App\Models\Author;

interface AuthorServiceInterface
{
    /**
     * Создание нового автора
     *
     * @param AuthorDTO $authorDTO
     */
    public function createAuthor(AuthorDTO $authorDTO):Author;

    public function updateAuthor(AuthorDTO $authorDTO, Author $author):Author;

    public function deleteAuthor(Author $author):void;
}
