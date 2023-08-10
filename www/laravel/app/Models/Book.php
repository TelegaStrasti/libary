<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quantity'
    ];

    public function authors():BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'taken_books');
    }
}
