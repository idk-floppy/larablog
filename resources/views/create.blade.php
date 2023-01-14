@extends('base_wnav', ['stitle' => 'New Post'])


@section('body')
    <x-block>
        <form method="post" action="{{ route('store') }}">
            @csrf
            <x-text-input-field name="title" id="title" pholder="Amazing title">
            </x-text-input-field>
            <x-text-input-field name="teaser" id="teaser" pholder="Catchy teaser">
            </x-text-input-field>
            <div><label for="content" class="capitalize">content</label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Write something..."
                    class="mt-1 w-full block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">{{ old('content') ?? '' }}</textarea>
                @if ($errors->has('content'))
                    <small class="text-red-600">{{ $errors->first('content') }}</small>
                @endif
            </div>
            <div><label for="tags" class="capitalize">tags</label>
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
            </div>
            <div class="mt-1 flex gap-3">
                <input type="submit" value="save"
                    class="rounded-md border-transparent bg-orange-200 hover:bg-orange-400 p-2 text-white font-semibold uppercase">
            </div>
        </form>
    </x-block>
@endsection
