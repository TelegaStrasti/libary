<?php

namespace App\Actions\Auth;

use App\DTO\Auth\AuthDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class RegisterAction
{
    /**
     * Регистрация нового юзера
     *
     * @param AuthDTO $authDTO
     * @return User
     */
    public function handle(AuthDTO $authDTO): User
    {
        $user = User::create([
            'name' => $authDTO->getName(),
            'email' => $authDTO->getEmail(),
            'password' => Hash::make($authDTO->getPassword()),
        ]);

//        $token = $user->createToken('MyApp')->accessToken;

        return $user;
    }
}
