<div>
    <form id="delete-{{ $post->id }}">
        @csrf
        <div class=" uppercase text-white bg-red-400 rounded-md p-2 cursor-pointer flex flex-row items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
            <div class="empty">&nbsp;</div>
            <input class="cursor-pointer" type="submit" value="DELETE">
        </div>
    </form>
</div>

@push('scripts')
    <script type="module" defer>
        $('#delete-{{ $post->id }}').submit((event)=>{
            event.preventDefault();
            Swal.fire({
                title: 'Delete "{{ $post->title }}"?',
                text: "Are you sure you want to delete this post? You won't be able to revert this action!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#FF6666',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url:'{{ route("blog.destroy", $post->id) }}',
                        data: {_token: "{{ csrf_token() }}"},
                        success: (response)=>{
                            window.redirectToThisURL = response;
                            Swal.fire(
                                'Success',
                                'Post deleted successfully!',
                                'success').then(()=>{
                                    if (window.location.href.indexOf("admin") == -1) {
                                        window.location.href = redirectToThisURL.url;
                                    }else{
                                        window.location.reload();
                                    }
                                })},
                        error: ()=>{
                            Swal.fire(
                                'Something went wrong!',
                                'Post was not deleted.',
                                'error');
                        }
                    });
            }});
        });
    </script>
@endpush
