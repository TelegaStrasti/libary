<?php
namespace App\Actions\Interfaces\Auth;

use App\DTO\Auth\AuthDTO;
use App\Models\User;

interface RegisterActionInterface
{
    /**
     * Регистрация нового юзера
     *
     * @param AuthDTO $authDTO
     * @return User
     */
    public function handle(AuthDTO $authDTO):User;
}
