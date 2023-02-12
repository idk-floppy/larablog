<form action="{{ Request::url() }}" method="get">
    <div class="grid grid-cols-4 gap-2 items-baseline">
        <x-text-input-field name="q" id="q" class="col-span-3" pholder="Search..." :value="request('q')" />
        <x-default-button value="Search" />
    </div>
</form>
