<div class="mt-3">
    <div class="mb-1 font-semibold">
        {{ Str::title($variations->first()?->type) }}
    </div>

    <x-select class="w-full" wire:model="selectedVariation">
        <option value="" disabled>Choose an option</option>

        @foreach ($variations as $variation)
            <option value="{{ $variation->id }}">
                {{ $variation->title }}
            </option>
        @endforeach
    </x-select>

    {{-- make sure that there is ? at the end of function so that this will not be null --}}
    {{-- use children to show all of the children of selected variant --}}
    @if ($this->getSelectedVariationModelProperty()?->children->count())
        {{-- use key binding so that livewire will be confused as to what children will show --}}
        <livewire:product-dropdown :variations="$this->getSelectedVariationModelProperty()?->children->sortBy('order')" :key="$selectedVariation" />
    @endif
</div>
