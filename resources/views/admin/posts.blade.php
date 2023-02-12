@extends('base_wnav', ['stitle' => 'Admin'])


@section('body')
    <x-block>
        <table id="adminTable" class="table-auto border-separate border border-slate-300  w-auto">
            <thead>
                <tr>
                    <th class="border border-slate-300 font-semibold p-2 text-slate-900 text-left">
                        Edit</th>
                    <th class="border border-slate-300 font-semibold p-2 text-slate-900 text-left">
                        Delete</th>
                    <th class="border border-slate-300 font-semibold p-2 text-slate-900 text-left">
                        Title</th>
                    <th class="border border-slate-300 font-semibold p-2 text-slate-900 text-left">
                        Published at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="border border-slate-300 p-2 text-slate-500">
                            <x-delete-modal :post="$post" />
                        </td>
                        <td class="border border-slate-300 p-2 text-slate-500">
                            <a href="{{ route('blog.edit', $post->id) }}">Edit</a>
                        </td>
                        <td class="border border-slate-300 p-2 text-slate-500">
                            {{ $post->title }}</td>
                        <td class="border border-slate-300 p-2 text-slate-500 italic">
                            <small>{{ $post->created_at->format('Y-m-d H:i') }}</small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-between align-baseline w-full my-2 px-2">
            <div>Showing {{ $posts->firstItem() }} - {{ $posts->lastItem() }} of {{ $posts->total() }}</div>
            <div>{{ $posts->appends($_GET)->links() }}</div>
        </div>
    </x-block>
@endsection
