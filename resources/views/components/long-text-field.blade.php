<div {{ $attributes->merge(['class' => '']) }}>
    <label for={{ $name }} class="capitalize">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $id }}" cols="30" rows="10" placeholder="{{ $pholder }}"
        {{ $attributes->merge(['class' => 'mt-1 w-full block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0']) }}>{{ old($name) ?? $slot }}</textarea>
    @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif
</div>
