<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIdentityPivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_uuid', 'book_identity_id'
    ];

}
