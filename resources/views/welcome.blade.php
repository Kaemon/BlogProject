<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold mb-6">Latest Blog Posts</h1>
        @if ($topPost)
            <a href="{{ route('post.show', $topPost) }}" class="block relative rounded-2xl overflow-hidden mb-10 group h-[480px]">
                @if ($topPost->image)
                    <img src="{{ Storage::url($topPost->image) }}" alt="{{ $topPost->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-full bg-gray-800"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-8 flex flex-col gap-3">
                    <div class="flex items-center gap-3 ">
                        <span class="text-xs font-medium px-3 py-1 rounded-full bg-white/20 text-white backdrop-blur-sm">{{ $topPost->category->name }}</span>
                        <span class="text-xs text-gray-400">{{ $topPost->created_at->diffForHumans() }}</span>
                        <span class="text-xs px-3 py-1 rounded-full bg-green-900/50 text-green-400">{{ $topPost->status }}</span>

                    </div>
                    <h2 class="text-4xl font-bold text-white leading-tight max-w-3xl group-hover:text-gray-200 transition-colors">{{ $topPost->title }}</h2>
                    <p class="text-gray-300 text-sm line-clamp-2 max-w-2xl">{{ strip_tags($topPost->description) }}</p>
                    <div class="flex items-center gap-1 text-sm text-white/70 mt-1">
                        <span>Read article</span>
                        <x-icons.icon />
                    </div>
                </div>
            </a>
        @endif
        <div class="flex items-center gap-2 mb-6 flex-wrap">
            <a href="/" class="px-4 py-2 rounded-full text-sm font-medium {{ !request()->has('category') ? 'bg-white text-black' : 'border border-gray-600 text-gray-300 hover:border-white hover:text-white' }} transition-colors">All</a>
            @foreach ($categories as $category)
                <x-category-button :category="$category" />
            @endforeach
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <p class="text-gray-500 col-span-3">No posts yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>