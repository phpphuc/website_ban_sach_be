<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo_url',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'author_product', 'author_id', 'product_id');
    }
}