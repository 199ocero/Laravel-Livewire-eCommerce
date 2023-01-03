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

    // calculating stock levels
    public function stockCount()
    {

        // Use descendantsAndSelf to show the total stocks from parent as well as its children
        // If only descendants, we can only show the parent total stocks
        // Sum all descendantsAndSelf stocks by using the amount column value in stocks table
        return $this->descendantsAndSelf->sum(fn ($variation) => $variation->stocks->sum('amount'));
    }

    // check if stock is greater than 0
    public function inStock()
    {
        return $this->stockCount() > 0;
    }

    // check if stock is out of stock
    // this mean that stock count is 0
    public function outOfStock()
    {
        return !$this->inStock();
    }

    // check stock is less than or equal to 5
    // this means that we have low stock in this particular item
    public function lowStock()
    {
        return !$this->outOfStock() && $this->stockCount() <= 5;
    }
}
