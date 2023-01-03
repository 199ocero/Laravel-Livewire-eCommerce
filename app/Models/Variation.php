<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Variation extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Function for formatted price to show as PHP currency
    public function formattedPrice()
    {
        return Money::PHP($this->price);
    }

    // relationship for stocks
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
