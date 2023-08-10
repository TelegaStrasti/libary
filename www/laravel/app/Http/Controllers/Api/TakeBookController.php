<?php

namespace App\Http\Controllers\Api;

use App\DTO\TakeBookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\TakeBookRequest;
use App\Models\Book;
use App\Repositories\TakeBookRepository;
use App\Services\Interfaces\TakeBookServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TakeBookController extends Controller
{
    public function __construct(
        protected TakeBookServiceInterface $takeBookService,
        protected TakeBookRepository $takeBookRepository
    )
    {}

    /**
     * Взятие книги из библиотеки
     *
     * @param TakeBookRequest $request
     * @param $bookId
     * @return JsonResponse
     */
    public function takeBook(TakeBookRequest $request, int $bookId): JsonResponse
    {
        $data = $request->validated();

        $book = $this->takeBookRepository->getBook($bookId);

        $takeBookDTO = new TakeBookDTO(
            ...$data
        );

        $user = Auth::user();

        $result = $this->takeBookService->takeBook($takeBookDTO, $user, $book);

        return response()->json($result);
    }

    /**
     * Возврат книги в библиотеку
     *
     * @param int $bookId
     * @return JsonResponse
     */
    public function returnBook(int $bookId): JsonResponse
    {
        $user = Auth::user();

        $book = $this->takeBookRepository->getBook($bookId);

        $result = $this->takeBookService->returnBook($user, $book);

        return response()->json($result);
    }
}
