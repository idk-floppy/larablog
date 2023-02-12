@extends('base_wnav', ['stitle' => 'Edit Post'])


@section('body')
    <x-block>
        <livewire:edit-post-form :post="$post" />
    </x-block>
@endsection
