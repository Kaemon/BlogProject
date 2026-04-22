<x-layout>
    <x-post-grid
        :posts="$posts"
        :title="$category->name"
        backHref="/categories"
        backLabel="← Categories"
    />
</x-layout>
