<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function readers()
    {
        return $this->belongsToMany(Reader::class, 'book_user', 'book_id', 'user_id');
    }
}
