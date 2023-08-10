<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Auth\RegisterAction;
use App\DTO\Auth\AuthDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Resources\Auth\AuthResource;
use Illuminate\Http\JsonResponse;

final class AuthController extends Controller
{
    public function __construct(
        protected RegisterAction $registerAction
    )
    {}

    /**
     * Регистрация нового юзера
     *
     * @param AuthRequest $request
     * @return JsonResponse
     */

    public function register(AuthRequest $request):JsonResponse
    {
        $data = $request->validated();

        $authDTO = new AuthDTO(
            ...$data
        );

        $user = $this->registerAction->handle($authDTO);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['message'=> 'Регистрация прошла успешно', ['token' => $token], AuthResource::make($user)]);
    }
}
