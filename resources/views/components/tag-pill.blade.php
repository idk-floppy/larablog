<div
    {{ $attributes->merge(['class' => 'inline-block bg-orange-100 text-orange-500 hover:bg-orange-500 hover:text-white px-3 py-1 rounded-full text-xs font-medium']) }}>
    <a href="{{ $url }}">{{ $slot }}</a>
</div>
