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
</div>
