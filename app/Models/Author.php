<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $table = 'authors';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'surname',
        'librarian_id',
    ];

    protected $with = [
        'librarian'
    ];

    public function librarian()
    {
        return $this->hasOne(User::class, 'id','librarian_id');
    }

}
