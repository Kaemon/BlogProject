<x-layout>
    <x-post-grid
        :posts="$posts"
        :title='"Results for: " . $query'
        backHref="/"
        backLabel="← Back to Home"
    />
</x-layout>
