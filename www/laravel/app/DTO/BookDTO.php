<?php

namespace App\DTO;

final class BookDTO
{
    public function __construct(
        readonly public string $title,
        readonly public int $quantity,
        readonly public array $genres,
        readonly public array $authors
    )
    {}

    /**
     * Получить название книги
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Получить количество книг
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Получить авторов
     *
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * Получить жанры
     *
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }
}
