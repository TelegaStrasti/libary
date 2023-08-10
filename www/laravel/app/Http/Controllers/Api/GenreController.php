<?php

namespace App\Http\Controllers\Api;

use App\DTO\GenreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Repositories\Interfaces\GenreRepositoryInterface;
use App\Services\Interfaces\GenreServiceInterface;
use Illuminate\Http\JsonResponse;

final class GenreController extends Controller
{
    public function __construct(
        protected GenreServiceInterface $genreService,
        protected GenreRepositoryInterface $genreRepository
    )
    {}

    /**
     * Пагинируемый список жанров
     *
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        $genres = $this->genreRepository->getPaginatedGenres();

        return response()->json(GenreResource::collection($genres));
    }

    /**
     * Создание нового жанра
     *
     * @param GenreRequest $request
     * @return JsonResponse
     */
    public function store(GenreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $genreDTO = new GenreDTO(
            ...$data
        );

        $result = $this->genreService->createGenre($genreDTO);

        return response()->json(GenreResource::make($result));
    }

    /**
     * Просмотр жанра
     *
     * @param Genre $genre
     * @return JsonResponse
     */
    public function show(Genre $genre): JsonResponse
    {
        return response()->json(GenreResource::make($genre));
    }

    /**
     * Обновление жанра
     *
     * @param GenreRequest $request
     * @param Genre $genre
     * @return JsonResponse
     */
    public function update(GenreRequest $request, Genre $genre): JsonResponse
    {
        $data = $request->validated();

        $genreDTO = new GenreDTO(
            ...$data
        );

        $result = $this->genreService->updateGenre($genreDTO, $genre);

        return response()->json(GenreResource::make($result));
    }

    /**
     * Удаление жанра
     *
     * @param Genre $genre
     * @return JsonResponse
     */
    public function destroy(Genre $genre): JsonResponse
    {
        $this->genreService->deleteGenre($genre);

        return response()->json('Жанр удален', '200');
    }
}
