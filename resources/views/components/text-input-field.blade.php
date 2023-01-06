<div><label for={{ $name }} class="capitalize">{{ $name }}</label>
    <input type="text" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $pholder }}"
        value="{{ old($name) ?? $slot }}"
        class="mt-1 w-full block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
    @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif
</div>
