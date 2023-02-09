@extends('base_wnav', ['stitle' => 'New Post'])


@section('body')
    <x-block>
        <livewire:create-post-form />
    </x-block>
@endsection
