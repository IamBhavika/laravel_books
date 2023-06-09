<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;
    protected $table = 'book_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
