@extends('base_wnav', ['stitle' => $post->title])


@section('body')
    <x-block class="bg-white rounded-md p-4">
        <div class="flex flex-col justify-between">
            <div class="flex space-x-2">
                @forelse ($post->tags as $tag)
                    <x-tagpill url="#">
                        {{ $tag->text }}</x-tagpill>
                @empty
                    <p class="italic">This post has no tags.</p>
                @endforelse
            </div>
            <p class="font-semibold text-lg">{{ $post->teaser }}</p>
            <p class="md:px-2 text-justify text-base leading-relaxed">{{ $post->content }}</p>
            <div class="mt-4">
                <small class="text-sm text-gray-400 italic">Created at {{ $post->created_at->format('Y M d.') }}</small>
                <hr class="my-2 border-gray-300">
            </div>
        </div>
    </x-block>
@endsection
