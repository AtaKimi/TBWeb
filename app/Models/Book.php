<?php

namespace App\Models;

use App\Models\BookKind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
  use HasFactory;

  protected $primaryKey = 'uuid';

  protected $casts = [
    'uuid' => 'string'
  ];

  protected $fillable = [
    'uuid', 'title', 'writer', 'summary', 'photo', 'price', 'book_kind_id'
  ];

  public function book_kind()
  {
    return $this->belongsTo(BookKind::class);
  }

  public function book_identity()
  {
    return $this->belongsToMany(BookIdentity::class, 'book_identity_pivots');
  }
}
