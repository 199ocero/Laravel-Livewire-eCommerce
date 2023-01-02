<div>
    {{-- Check first category and set to bold --}}
    <a href="/categories/{{ $category->slug }}"
        class="{{ $category->depth === 0 ? 'font-bold' : '' }}">{{ $category->title }}</a>

    {{-- Check children and loop through each child --}}
    @foreach ($category->children as $child)
        <div class="ml-4">
            <x-category :category="$child" />
        </div>
    @endforeach
</div>
