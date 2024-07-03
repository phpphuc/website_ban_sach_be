<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
  use HasFactory;
  protected $fillable = [
    'title',
    'price',
    'quantity',
    'description',
    'photo_url',
    'category_id',
    'isbn',
    'file_format',
    'duration',
    'author_ids'
  ];

  protected $casts = [
    'author_ids' => 'array',
];

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }

  public function authors()
  {
    return $this->belongsToMany(Author::class, 'author_product', 'product_id', 'author_id');
  }
}
