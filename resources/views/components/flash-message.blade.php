@if ($message = Session::get('success'))
    <x-block @class([
        'text-green-700 my-2' => Session::get('success'),
    ])>
        <p>{{ $message }}</p>
    </x-block>
@endif

@if ($message = Session::get('error'))
    <x-block @class([
        'text-red-700 my-2' => Session::get('error'),
    ])>
        <p>{{ $message }}</p>
    </x-block>
@endif
