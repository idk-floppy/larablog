@extends('base_wnav', ['stitle' => $tag->text])


@section('body')
    <x-block class="bg-white rounded-md p-4 block">
        <div class="flex flex-col justify-between">
            <div class="flex space-x-2 mb-2">
                <ul>
                    @forelse ($tag->posts as $post)
                        <li><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></li>
                    @empty
                        <p class="italic">This tag has no posts.</p>
                    @endforelse
                </ul>
            </div>
            <div class="mt-4 flex flex-row gap-2">
                <hr class="my-2 border-gray-300">
                <x-delete-modal data-object="{{ $tag }}" data-url="{{ route('admin.destroy', $tag->id) }}" />
                <x-edit-button type="admin" :object="$tag" />
            </div>
        </div>
    </x-block>
@endsection
