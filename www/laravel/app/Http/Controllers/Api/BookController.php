<?php

namespace App\Http\Controllers\Api;

use App\DTO\BookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Services\Interfaces\BookServiceInterface;
use Illuminate\Http\JsonResponse;

final class BookController extends Controller
{
    public function __construct(
        protected BookRepositoryInterface $bookRepository,
        protected BookServiceInterface $bookService
    )
    {}

    /**
     * Пагинируемый список книг
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $books = $this->bookRepository->getPaginatedBooks();

        return response()->json(BookResource::collection($books));
    }

    /**
     * Детальная страница книги
     *
     * @param Book $book
     * @return JsonResponse
     */
    public function show(Book $book): JsonResponse
    {
        $result =  $book->load('authors', 'genres');

        return response()->json(BookResource::make($result));
    }

    /**
     * Добавление новой книги
     *
     * @param BookRequest $request
     * @return JsonResponse
     */
    public function store(BookRequest $request):JsonResponse
    {
        $data = $request->validated();

        $bookDTO = new BookDTO(
            ...$data
        );

        $result = $this->bookService->createBook($bookDTO);

        return response()->json(BookResource::make($result));
    }

    /**
     * Изменение книги
     *
     * @param BookRequest $request
     * @param Book $book
     * @return JsonResponse
     */
    public function update(BookRequest $request, Book $book): JsonResponse
    {
        $data = $request->validated();

        $bookDTO = new BookDTO(
            ...$data
        );

        $result = $this->bookService->updateBook($bookDTO, $book);

        return response()->json(BookResource::make($result));
    }

    /**
     * Удаление книги
     *
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book): JsonResponse
    {
        $this->bookService->deleteBook($book);

        return response()->json(['message' => 'Книга удалена'],'200');
    }
}
