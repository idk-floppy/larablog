<div>
    <form id="rm-image-{{ $object->id }}">
        @csrf
        <x-delete-button value="REMOVE IMAGE" />
    </form>
</div>

@push('scripts')
    <script type="module" defer>
        $('#rm-image-{{ $object->id }}').submit((event)=>{
            event.preventDefault();
            Swal.fire({
                title: 'Delete image?',
                text: "You won't be able to revert this action!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#FF6666',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url:'{{ route("blog.deleteImage", $object->id) }}',
                        data: {_token: "{{ csrf_token() }}"},
                        success: (response)=>{
                            window.redirectToThisURL = response;
                            Swal.fire(
                                'Success',
                                'Image deleted successfully!',
                                'success').then(()=>{
                                    window.location.reload();
                                })},
                        error: ()=>{
                            Swal.fire(
                                'Something went wrong!',
                                'Image was not deleted.',
                                'error');
                        }
                    });
            }});
        });
    </script>
@endpush
