<?php

namespace App\DTO;

final class AuthorDTO
{
    public function __construct
    (
        readonly protected string $name,
    )
    {}

    /**
     * Получить имя автора
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
