<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Blog</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 flex flex-col h-screen justify-between">
    @include('components.navbar')

    <div class="container sm:mx-auto my-2 p-4">
        <h1 class="text-3xl capitalize py-2">{{ $stitle ?? '' }}</h1>
        <x-flash-message />
        @yield('body')
    </div>

    <div class="bg-black text-white w-full p-4">
        <div class="container grid grid-cols-3 gap-2 mx-auto">
            <div>
                <h3 class="font-semibold">Useful links</h3>
                <ul class="pl-2">
                    <li>
                        <a class="link" href="https://laravel.com/">Laravel</a>
                    </li>
                    <li>
                        <a class="link" href="https://laracasts.com/">Laracasts</a>
                    </li>
                    <li>
                        <a class="link" href="https://google.com/">Google</a>
                    </li>
                    <li>
                        <a class="link" href="https://stackoverflow.com/">Stackoverflow</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold">Navigation</h3>
                <ul class="pl-2">
                    <li>
                        <x-nav-item href="{{ route('blog.home') }}">Blog</x-nav-item>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    @livewireScripts
    @stack('scripts')
</body>

</html>
