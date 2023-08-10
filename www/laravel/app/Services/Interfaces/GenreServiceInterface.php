<?php

namespace App\Services\Interfaces;

use App\DTO\GenreDTO;
use App\Models\Genre;

interface GenreServiceInterface
{
    /**
     * Создание жанра
     *
     * @param GenreDTO $genreDTO
     * @return Genre
     */
    public function createGenre(GenreDTO $genreDTO):Genre;

    /**
     * Обновление жанра
     *
     * @param GenreDTO $genreDTO
     * @param Genre $genre
     * @return Genre
     */
    public function updateGenre(GenreDTO $genreDTO, Genre $genre): Genre;

    /**
     * Удаление жанра
     *
     * @param Genre $genre
     * @return void
     */
    public function deleteGenre(Genre $genre):void;
}
