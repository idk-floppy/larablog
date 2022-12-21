@extends('base_wnav', ['stitle' => $post->title])


@section('body')
    <x-block>
        <div class="flex space-x-2">
            @forelse ($post->tags as $tag)
                <x-tagpill url="#">{{ $tag->text }}</x-tagpill>
            @empty
                <p class="italic">This post has no tags.</p>
            @endforelse
        </div>
        <p class="font-semibold">{{ $post->teaser }}</p>
        <p class="md:px-2 text-justify">{{ $post->content }}</p>


        <small class="text-sm text-gray-400 italic">Created at {{ $post->created_at->format('Y M d.') }}</small>
        <hr>
    </x-block>
@endsection
