<?php

namespace App\Services;

use App\DTO\TakeBookDTO;
use App\Models\Book;
use App\Models\User;
use App\Services\Interfaces\TakeBookServiceInterface;
use Illuminate\Support\Carbon;

class TakeBookService implements TakeBookServiceInterface
{
    /**
     * Взятие книги из библиотеки
     *
     * @param TakeBookDTO $takeBookDTO
     * @param $user
     * @param Book $book
     * @return array
     */
    public function takeBook(TakeBookDTO $takeBookDTO, $user, Book $book): array
    {
        $returnDate = $takeBookDTO->getDate();

        if ($book->quantity <= 0) {
            return ['message' => 'В библиотеке нет доступных экземпляров данной книги'];
        }

        if ($user->takenBooks()->where('book_id', $book->id)->exists()) {
            return ['message' => 'Вы уже взяли эту книгу из библиотеки'];
        }

        $user->takenBooks()->attach($book->id, ['return_date' => Carbon::parse($returnDate)->format('Y-m-d')]);

        $book->decrement('quantity');

        return ['message' => 'Книга успешно взята из библиотеки'];
    }

    /**
     * Возврат книги
     *
     * @param $user
     * @param Book $book
     * @return string[]
     */
    public function returnBook($user, Book $book): array
    {
        if ($user->takenBooks()->where('book_id', $book->id)->exists()) {

            $user->takenBooks()->detach($book->id);

            $book->increment('quantity');

            return ['message' => 'Книга успешно возвращена в библ   иотеку'];
        }

        return ['message' => 'У вас нет этой книги, чтобы вернуть ее в библиотеку'];
    }
}
