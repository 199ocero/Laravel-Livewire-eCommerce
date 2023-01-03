<?php

namespace App\Http\Livewire;

use App\Models\Variation;
use Livewire\Component;

class ProductSelector extends Component
{

    // The variable product is where the variable you set in livewire component
    public $product, $initialVariation, $skuVariant;

    // we will listen an event from ProductDropdown called skuVariantSelected
    protected $listeners = ['skuVariantSelected'];

    public function mount()
    {
        $this->initialVariation = $this->product->variations->sortBy('order')->groupBy('type')->first();
    }


    /*
     We will create a function for skuVariantSelected event
     and get the variant property or data from the ID we pass
     */
    public function skuVariantSelected($variandID)
    {
        $this->skuVariant = Variation::find($variandID);
    }

    // we will create a function for addToCart click event
    public function addToCart()
    {
        dd($this->skuVariant);
    }
    public function render()
    {
        return view('livewire.product-selector');
    }
}
