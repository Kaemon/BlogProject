@props(['category'])

<a href="/?category={{ $category->id }}" class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') == $category->id ? 'bg-white text-black' : 'border border-gray-600 text-gray-300 hover:border-white hover:text-white' }} transition-colors">{{ $category->name }}</a>
