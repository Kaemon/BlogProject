<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-2xl font-bold mb-6">Latest Posts</h1>
        <div class="flex items-center gap-2 mb-6 flex-wrap">
            <a href="/" class="px-4 py-2 rounded-full text-sm font-medium {{ !request()->has('category') ? 'bg-white text-black' : 'border border-gray-600 text-gray-300 hover:border-white hover:text-white' }} transition-colors">All</a>
            @foreach ($categories as $category)
                <a href="/?category={{ $category->id }}" class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') == $category->id ? 'bg-white text-black' : 'border border-gray-600 text-gray-300 hover:border-white hover:text-white' }} transition-colors">{{ $category->name }}</a>
            @endforeach
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <a href="{{ route('post.show', $post) }}" class="border border-gray-700 rounded-xl overflow-hidden flex flex-col gap-3 hover:border-gray-500 transition-colors">
                    @if ($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-800"></div>
                    @endif
                    <div class="px-6 pb-6 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400">{{ $post->category->name ?? 'Uncategorized' }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-green-900/50 text-green-400">{{ $post->status }}</span>
                    </div>
                    <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-gray-400 text-sm line-clamp-3">{{ $post->description }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 col-span-3">No posts yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>