<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 gap-4 p-6 bg-white border-b border-gray-200">
                    <div class="grid col-span-1">
                        Image gallery
                    </div>
                    <div class="col-span-1 space-y-6">
                        <div>
                            <h1>{{ $product->title }}</h1>
                            <h1 class="mt-2 text-xl font-semibold">
                                {{-- The formattedPrice function can be located to Product Model --}}
                                {{-- This function will show a price format as PHP --}}
                                {{ $product->formattedPrice() }}
                            </h1>
                            <p class="mt-2 text-gray-500">
                                {{ $product->description }}
                            </p>
                        </div>

                        <div class="mt-6">
                            {{ $product->variations->sortBy('order')->groupBy('type')->first() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
