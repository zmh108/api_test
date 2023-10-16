<?php

namespace App\Models\Model;

use App\Models\Model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
