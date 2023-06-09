<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid'];

    protected $casts = [
        'uuid' => 'string'
      ];
}
