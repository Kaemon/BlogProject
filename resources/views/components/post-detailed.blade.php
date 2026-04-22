@props(['post'])


<div class="max-w-3xl mx-auto px-6 py-10">
        <div class="flex items-center gap-3 mb-4">
            <a href="/" class="text-sm text-gray-400 hover:text-white transition-colors">← Back</a>
            <span class="text-gray-600">|</span>
            <span class="text-sm text-gray-400">{{ $post->category->name }}</span>
        </div>

        <h1 class="text-3xl font-bold mb-3">{{ $post->title }}</h1>
        <p class="text-xs text-gray-500 mb-6">{{ $post->created_at->diffForHumans() }}</p>

        @if ($post->image)
            <div class="flex justify-center mb-8">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="max-h-80 w-auto object-contain rounded-xl">
            </div>
        @endif

        <p class="text-gray-300 leading-relaxed">{{ $post->description }}</p>
</div>