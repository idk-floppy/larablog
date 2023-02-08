@extends('base_wnav', ['stitle' => 'New Post'])


@section('body')
    <x-block>
        <form method="post" action="{{ route('blog.update') }}">
            <input type="hidden" name="uid" value="{{ $post->id }}">
            @if ($errors->any())
                <div class="p-4 w-full block rounded-md bg-white">
                    <ul>
                        {!! implode('', $errors->all('<li class="text-red-600">:message</li>')) !!}
                    </ul>
                </div>
            @endif
            @csrf
            <x-text-input-field name="title" id="title" pholder="Amazing title">
                {{ $post->title }}
            </x-text-input-field>
            <x-text-input-field name="teaser" id="teaser" pholder="Catchy teaser">
                {{ $post->teaser }}
            </x-text-input-field>
            <x-long-text-field name="content" id="content" label="Content" pholder="Write something...">
                {{ $post->content }}
            </x-long-text-field>
            <div><label for="tags" class="capitalize">tags</label>
                <select name="tags[]" id="tags" multiple
                    class="select2 mt-1 w-full block rounded-md bg-gray-100 border-transparent hover:border-gray-500 hover:bg-white hover:ring-0">
                    @if (old('tags'))
                        @foreach (old('tags') as $oldtag)
                            <option value="{{ $oldtag }}" selected>{{ $oldtag }}</option>
                        @endforeach
                    @elseif ($post->tags()->count() > 0)
                        @foreach ($post->tags as $singleTag)
                            <option value="{{ $singleTag->text }}" selected>{{ $singleTag->text }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('tags'))
                    <small class="text-red-600">{{ $errors->first('tags') }}</small>
                @endif
            </div>
            <div class="mt-1 flex gap-3">
                <input type="submit" value="save"
                    class="rounded-md border-transparent bg-orange-200 hover:bg-orange-400 p-2 text-white font-semibold uppercase">
            </div>
        </form>
    </x-block>
@endsection
