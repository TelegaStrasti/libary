<?php

namespace App\DTO;

final class GenreDTO
{
    public function __construct
    (
        readonly protected string $name,
    )
    {}

    /**
     * Получить название жанра
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
