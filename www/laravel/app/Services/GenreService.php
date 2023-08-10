<?php

namespace App\Services;

use App\DTO\GenreDTO;
use App\Models\Genre;
use App\Services\Interfaces\GenreServiceInterface;

final class GenreService implements GenreServiceInterface
{
    /**
     * Создание жанра
     *
     * @param GenreDTO $genreDTO
     * @return Genre
     */
    public function createGenre(GenreDTO $genreDTO):Genre
    {
        return Genre::create([
            'name' => $genreDTO->getName()
        ]);
    }

    /**
     * Обновление жанра
     *
     * @param GenreDTO $genreDTO
     * @param Genre $genre
     * @return Genre
     */
    public function updateGenre(GenreDTO $genreDTO, Genre $genre): Genre
    {
        $genre->update([
            'name' => $genreDTO->getName(),
        ]);

        return $genre;
    }

    /**
     * Удаление жанра
     *
     * @param Genre $genre
     * @return void
     */
    public function deleteGenre(Genre $genre):void
    {
        $genre->delete();
    }
}
