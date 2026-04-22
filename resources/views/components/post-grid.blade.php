@props(['posts', 'title', 'backHref', 'backLabel'])

<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex items-center gap-3 mb-8">
        <a href="{{ $backHref }}" class="text-sm text-gray-400 hover:text-white transition-colors">{{ $backLabel }}</a>
    </div>
    <h1 class="text-4xl font-bold mb-8">{{ $title }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="text-gray-500 col-span-3">No posts found.</p>
        @endforelse
    </div>
</div>
