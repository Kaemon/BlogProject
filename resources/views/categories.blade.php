<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold mb-8">Categories</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="border border-gray-700 rounded-xl p-6 hover:border-gray-500 transition-colors">
                    <p class="text-lg font-semibold">{{ $category->name }}</p>
                </a>
            @empty
                <p class="text-gray-500 col-span-3">No categories yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>
