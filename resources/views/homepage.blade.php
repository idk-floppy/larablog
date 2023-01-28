@extends('base_wnav', ['stitle' => 'Posts'])


@section('body')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        @forelse ($posts as $post)
            <x-block class="flex flex-col justify-between">
                <div>
                    <x-post-title :url="route('show', $post->id)">{{ $post->title }}</x-post-title>
                    <small class="text-sm text-gray-400 italic">{{ $post->created_at->format('Y/m/d H:i') }}</small>
                    <hr>
                    <div class="text-gray-700 mb-4">{{ $post->teaser }}</div>
                </div>
                <div class="flex space-x-2">
                    @foreach ($post->tags as $tag)
                        <x-tagpill url="#">{{ $tag->text }}</x-tagpill>
                    @endforeach
                </div>
            </x-block>
        @empty
            <x-block>
                <p>No posts were found.</p>
            </x-block>
        @endforelse
    </div>
    <div class="flex justify-between align-baseline w-full mx-0">
        <div>Showing {{ $posts->firstItem() }} - {{ $posts->lastItem() }} of {{ $posts->total() }}</div>
        <div>{{ $posts->links() }}</div>
    </div>
@endsection
{{-- <input type="text" name="a" id="a" placeholder="a"
    class="mt-1 block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"> --}}
