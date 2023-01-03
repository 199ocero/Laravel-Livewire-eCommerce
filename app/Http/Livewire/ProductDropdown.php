<?php

namespace App\Http\Livewire;

use App\Models\Variation;
use Livewire\Component;

class ProductDropdown extends Component
{
    public $variations, $selectedVariation = '';


    // this will get the model property or data of variation depending on the selected ID
    public function getSelectedVariationModelProperty()
    {
        return Variation::find($this->selectedVariation);
    }
    // when there is something change in dropdown this function will run
    public function updatedSelectedVariation()
    {
        // check if there is SKU exist
        if ($this->getSelectedVariationModelProperty()?->sku) {

            /*we pass an event called skuVariantSelected to product-selector
            component and then we will send an ID from $selectedVariation
            */
            $this->emitTo('product-selector', 'skuVariantSelected', $this->selectedVariation);
        }
    }
    public function render()
    {
        return view('livewire.product-dropdown');
    }
}
