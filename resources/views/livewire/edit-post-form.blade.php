<form method="post" action="{{ route('blog.update') }}" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="p-4 w-full block rounded-md bg-white">
            <ul>
                {!! implode('', $errors->all('<li class="text-red-600">:message</li>')) !!}
            </ul>
        </div>
    @endif
    @csrf

    <input type="hidden" name="uid" value="{{ $post->id }}">
    <x-label name="title" label="title" />
    <x-text-input-field name="title" id="title" label="Title" pholder="Amazing title">
        {{ $post->teaser }}
    </x-text-input-field>
    <x-label name="teaser" label="teaser" />
    <x-text-input-field name="teaser" id="teaser" label="Teaser" pholder="Catchy teaser">
        {{ $post->teaser }}
    </x-text-input-field>
    <x-label name="image" label="image" />
    <input type="file" name="image" id="image" placeholder="Select an image"
        class="mt-1 w-full block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
    <x-label name="content" label="content" />
    <livewire:text-editor :text="old('content') ?? $post->content" tid="content" />
    <x-label name="tags" label="tags" />
    <livewire:select2 :post="$post" />
    <div class="mt-1 flex gap-3">
        <x-default-button value="Save" />
    </div>
</form>
