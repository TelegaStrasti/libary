<?php

namespace App\DTO\Auth;

class AuthDTO
{
    public function __construct
    (
        readonly protected string $name,
        readonly protected string $email,
        readonly protected string $password,
    )
    {}

    /**
     * Получить имя юзера
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Получить почту юзера
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->name;
    }

    /**
     * Получить пароль юзера
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->name;
    }
}
