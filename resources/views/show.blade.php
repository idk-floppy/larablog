@extends('base_wnav', ['stitle' => $post->text])


@section('body')
    <x-block class="bg-white rounded-md p-4 block">
        <div class="flex flex-col justify-between">
            <div class="flex space-x-2 mb-2">
                @forelse ($post->tags as $tag)
                    <x-tagpill url="#">
                        {{ $tag->text }}</x-tagpill>
                @empty
                    <p class="italic">This post has no tags.</p>
                @endforelse
            </div>
            <hr>
            <div class="font-semibold text-lg">{{ $post->teaser }}</div>
            <x-post-image image="{{ $post->image }}" />
            <small class="text-sm text-gray-400 italic">Created at {{ $post->created_at->format('Y M d.') }}</small>
            <hr>
            <div class="md:px-2 text-justify text-base leading-relaxed">{!! $content !!}</div>
            <div class="mt-4 flex flex-row gap-2">
                <hr class="my-2 border-gray-300">
                <x-edit-button type="blog" :object="$post" />
                <x-delete-modal type="blog" :object="$post" />
                <x-remove-image-from-post-component :object="$post" />
            </div>
        </div>
    </x-block>
@endsection
