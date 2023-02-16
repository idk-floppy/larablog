@extends('base_wnav', ['stitle' => 'Posts'])


@section('body')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        <x-block class="col-span-1 md:col-span-2 lg:col-span-3 px-2 py-2 my-2">
            <x-searchbar />
        </x-block>
        @forelse ($posts as $post)
            <x-block class="flex flex-col justify-between">
                <div>
                    <x-post-image image="{{ $post->image }}" />
                    <x-post-title :url="route('blog.show', $post->id)">{{ $post->text }}</x-post-title>
                    <small class="text-sm text-gray-400 italic">{{ $post->created_at->format('Y-m-d H:i') }}</small>
                    <hr>
                    <div class="text-gray-700 mb-4">{{ $post->teaser }}</div>
                </div>
                <div class="flex space-x-2">
                    @foreach ($post->tags as $tag)
                        <x-tagpill url="{{ route('admin.show', $tag->id) }}">{{ $tag->text }}</x-tagpill>
                    @endforeach
                </div>
            </x-block>
        @empty
            <x-block>
                <p>No posts were found.</p>
            </x-block>
        @endforelse
    </div>
    <div class="flex justify-between align-baseline w-full my-2 px-2">
        <div>Showing {{ $posts->firstItem() }} - {{ $posts->lastItem() }} of {{ $posts->total() }}</div>
        <div>{{ $posts->appends($_GET)->links() }}</div>
    </div>
@endsection
