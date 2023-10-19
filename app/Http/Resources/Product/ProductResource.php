<?php

namespace App\Http\Resources\Product;

use App\Models\Model\Product;
use App\Models\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' => $this->discount,
            'total_price' => round((1-($this->discount/100)) * $this->price, 2),
            'rating' => $this->review->count() > 0 ? round($this->review->sum('star')/$this->review->count(),2) : 'No rating yet',
            //'rating' => $this->reviews->sum('star')/$this->reviews->count(),
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
