<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'title',
        'description',
        'book_number',
        'author_id',
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id','author_id');
    }


}
