@extends('base_wnav', ['stitle' => 'New Post'])


@section('body')
    <x-block>
        <livewire:edit-post-form :post="$post" />
    </x-block>
@endsection
