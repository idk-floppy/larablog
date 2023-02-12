@extends('base_wnav', ['stitle' => 'Edit Tag'])


@section('body')
    <x-block>
        <livewire:edit-tag-form :tag="$tag" />
    </x-block>
@endsection
