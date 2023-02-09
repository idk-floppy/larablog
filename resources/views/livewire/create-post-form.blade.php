<form method="post" action="{{ route('blog.store') }}">
    @if ($errors->any())
        <div class="p-4 w-full block rounded-md bg-white">
            <ul>
                {!! implode('', $errors->all('<li class="text-red-600">:message</li>')) !!}
            </ul>
        </div>
    @endif
    @csrf
    <x-text-input-field name="title" id="title" label="Title" pholder="Amazing title">
    </x-text-input-field>
    <x-text-input-field name="teaser" id="teaser" label="Teaser" pholder="Catchy teaser">
    </x-text-input-field>
    <livewire:text-editor :text="old('content') ?? ''" tid="content" />
    <livewire:select2 />
    {{-- <div><label for="tags" class="capitalize">tags</label>
        <select name="tags[]" id="tags" multiple
            class="select2 mt-1 w-full block rounded-md bg-gray-100 border-transparent hover:border-gray-500 hover:bg-white hover:ring-0">
            @if (old('tags'))
                @foreach (old('tags') as $oldtag)
                    <option value="{{ $oldtag }}" selected>{{ $oldtag }}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('tags'))
            <small class="text-red-600">{{ $errors->first('tags') }}</small>
        @endif
    </div> --}}
    <div class="mt-1 flex gap-3">
        <x-default-button value="Save" />
    </div>
</form>
