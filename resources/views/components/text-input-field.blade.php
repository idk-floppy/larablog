<div {{ $attributes->merge(['class' => '']) }}>
    <input type="text" name="{{ $name }}" id="{{ $id }}"
        {{ $attributes->merge(['class' => 'mt-1 w-full block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0']) }}
        placeholder="{{ $pholder }}" value="{{ old($name) ?? $slot }}">
    @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif
</div>
