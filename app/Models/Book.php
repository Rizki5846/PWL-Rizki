<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Book extends Model
{
    use HasFactory;
    public function bookshelf(): BelongsTo
    {
        return $this->belongsTo(Bookshelf::class);
    }

    protected $fillable = [
        'title',
        'author',
        'year',
        'publisher',
        'city',
        'quantity',
        'bookshelf_id',
        'cover',
    ];

}