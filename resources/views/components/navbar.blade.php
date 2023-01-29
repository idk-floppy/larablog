<nav class="relative p-2 bg-gray-300 shadow-sm">
    <div class="flex items-center justify-between">
        <div class="flex flex-col md:flex-row items-center justify-between w-full md:w-auto">
            <div class="p-4 flex justify-between md:border-r-4 md:border-orange-500 w-full md:w-auto">
                <h1><a href="{{ route('blog.home') }}">WeBlog</a></h1>
                <div class="p-2 space-y-2 bg-gray-500 rounded shadow md:hidden" id="burger">
                    <span class="block w-8 h-0.5 bg-gray-100 animate-pulse"></span>
                    <span class="block w-8 h-0.5 bg-gray-100 animate-pulse"></span>
                    <span class="block w-8 h-0.5 bg-gray-100 animate-pulse"></span>
                </div>
            </div>
            <div id="navlinks" class="hidden flex-col md:flex md:flex-row md:space-x-3">
                @if (Route::has('blog.home'))
                    <x-nav-item href="{{ route('blog.home') }}">Blog</x-nav-item>
                @endif
                @if (Route::has('blog.create'))
                    <x-nav-item href="{{ route('blog.create') }}">New post</x-nav-item>
                @endif
            </div>
        </div>
    </div>
</nav>
