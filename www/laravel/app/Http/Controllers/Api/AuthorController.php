<?php

namespace App\Http\Controllers\Api;

use App\DTO\AuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Services\Interfaces\AuthorServiceInterface;
use Illuminate\Http\JsonResponse;

final class AuthorController extends Controller
{
    public function __construct(
        protected AuthorRepositoryInterface $authorRepository,
        protected AuthorServiceInterface $authorService
    )
    {}

    /**
     * Вернуть пагинируемый список авторов
     *
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        $authors = $this->authorRepository->getPaginatedAuthors();

        return response()->json(AuthorResource::collection($authors));
    }

    /**
     * Создание нового автора
     *
     * @param AuthorRequest $request
     * @return JsonResponse
     */
    public function store(AuthorRequest $request): JsonResponse
    {
        $data = $request->validated();

        $authorDTO = new AuthorDTO(
            ...$data
        );

        $result = $this->authorService->createAuthor($authorDTO);

        return response()->json(AuthorResource::make($result));
    }

    /**
     * Получить автора
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        return response()->json(AuthorResource::make($author));
    }

    /**
     * Изменение автора
     *
     * @param AuthorRequest $request
     * @param Author $author
     * @return JsonResponse
     */
    public function update(AuthorRequest $request, Author $author): JsonResponse
    {
        $data = $request->validated();

        $authorDTO = new AuthorDTO(
            ...$data
        );

        $result = $this->authorService->updateAuthor($authorDTO, $author);

        return response()->json(AuthorResource::make($result));
    }

    /**
     * Удаление автора
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function destroy(Author $author): JsonResponse
    {
        $this->authorService->deleteAuthor($author);

        return response()->json('Автор удален', '200');
    }
}
