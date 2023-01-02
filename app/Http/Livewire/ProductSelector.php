<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSelector extends Component
{

    // The variable product is where the variable you set in livewire component
    public $product, $initialVariation;

    public function mount()
    {
        $this->initialVariation = $this->product->variations->sortBy('order')->groupBy('type')->first();
    }
    public function render()
    {
        return view('livewire.product-selector');
    }
}
