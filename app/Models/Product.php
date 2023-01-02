<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Function for formatted price to show as PHP currency
    public function formattedPrice()
    {
        return Money::PHP($this->price);
    }

    // Function for product variations
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}
