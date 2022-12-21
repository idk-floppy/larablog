<div
    {{ $attributes->merge(['class' => 'text-sm bg-gray-200 p-1 rounded-md font-semibold hover:bg-black hover:text-white']) }}>
    <a href="{{ $url }}">{{ $slot }}</a></div>
