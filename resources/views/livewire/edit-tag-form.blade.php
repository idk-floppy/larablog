<form method="post" action="{{ route('admin.update') }}">
    @csrf
    <input type="hidden" name="uid" value="{{ $tag->id }}">
    <x-label name="tag" label="tag" />
    <x-text-input-field name="tag" id="tag" pholder="Tag">
        {{ $tag->text }}
    </x-text-input-field>
    <div class="mt-1 flex gap-3">
        <x-default-button value="Save" />
    </div>
</form>
