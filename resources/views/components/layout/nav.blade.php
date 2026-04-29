<nav class="border-b border-border">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Logo" width="100">
            </a>
        </div>
        <div class="flex items-center gap-x-4">
            <a href="/" class="text-sm text-gray-400 hover:text-white transition-colors">Home</a>
            <a href="/categories" class="text-sm text-gray-400 hover:text-white transition-colors">Category</a>
            <form action="/search" method="GET" class="flex items-center gap-2">
                <div class="flex items-center gap-2 border border-gray-600 rounded-lg px-4 py-2">
                    <x-icons.search-icon />
                    <input type="search" name="q" class="bg-transparent outline-none text-sm placeholder-gray-400" placeholder="Search" />    
                </div>
                <button class="px-4 py-2 bg-white text-black text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">Search</button>
            </form>
        </div>
    
    </div>
</nav>