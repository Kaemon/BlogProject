<x-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold mb-8">Categories</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="group border border-gray-700 rounded-xl overflow-hidden hover:border-gray-500 transition-colors flex flex-col">
                    @if ($category->image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                    @else
                        <div class="w-full h-48 bg-gray-800"></div>
                    @endif
                    <div class="px-5 py-4">
                        <p class="text-lg font-semibold">{{ $category->name }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 col-span-3">No categories yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>
