@extends('base_wnav', ['stitle' => $post->title])


@section('body')
    <dialog id="dialog">
        <x-block class="w-2/5 mx-auto">
            <h3>Delete post?</h3>
            <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
                @csrf
                <input type="hidden" name="uid" value="{{ $post->id }}">
                <input type="submit" id="confirm" value="Delete" class="m-2 p-2 bg-red-600 text-white rounded-md">
                <input type="button" id="cancel" value="Nevermind" class="m-2 p-1 bg-white text-orange-600">
            </form>
        </x-block>
    </dialog>
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
            <hr>
            <p class="font-semibold text-lg">{{ $post->teaser }}</p>
            <p class="md:px-2 text-justify text-base leading-relaxed">{!! $content !!}</p>
            <div class="mt-4">
                <small class="text-sm text-gray-400 italic">Created at {{ $post->created_at->format('Y M d.') }}</small>
                <hr class="my-2 border-gray-300">
                <a href="{{ route('blog.edit', $post->id) }}">Edit</a>
                <a id="delete">Delete</a>
            </div>
        </div>
    </x-block>
@endsection
