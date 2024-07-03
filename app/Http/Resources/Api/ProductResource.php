<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'photo_url' => $this->photo_url,
            'description' => $this->description,
            'isbn' => $this->isbn,
            'file_format' => $this->file_format,
            'duration' => $this->duration,
            'category' => new CategoryResource($this->category),
            'authors' => AuthorResource::collection($this->authors),
        ];
    }
}