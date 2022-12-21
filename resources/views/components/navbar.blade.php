<nav class="relative p-2 bg-gray-300 shadow-sm">
    <div class="flex items-center justify-between">
        <div class="flex items-center justify-between">
            <div class="p-4 md:border-r-4 md:border-orange-500">
                <h1>Weblog</h1>
            </div>
            <div class="hidden md:flex space-x-3">
                @if (Route::has('home'))
                    <x-nav-item href="{{ route('home') }}">Blog</x-nav-item>
                @endif
                @if (Route::has('create'))
                    <x-nav-item href="{{ route('create') }}">New post</x-nav-item>
                @endif
            </div>
        </div>
        <div class="hidden md:flex space-x-3">
            @if (Route::has('admin'))
                <x-nav-item href="{{ route('home') }}">Admin</x-nav-item>
            @endif
        </div>
    </div>
</nav>
