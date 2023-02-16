<div>
    <form id="delete-{{ $object->id }}">
        @csrf
        <x-delete-button />
    </form>
</div>

@push('scripts')
    <script type="module" defer>
        $('#delete-{{ $object->id }}').submit((event)=>{
            event.preventDefault();
            window.type = '{{ $type }}';
            Swal.fire({
                title: 'Delete "{{ $object->text }}"?',
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
                        url:'{{ route("$type.destroy", $object->id) }}',
                        data: {_token: "{{ csrf_token() }}"},
                        success: (response)=>{
                            window.redirectToThisURL = response;
                            Swal.fire(
                                'Success',
                                'Record deleted successfully!',
                                'success').then(()=>{
                                    console.log(redirectToThisURL.url);
                                    window.location.href = redirectToThisURL.url;
                                })},
                        error: ()=>{
                            Swal.fire(
                                'Something went wrong!',
                                'Record was not deleted.',
                                'error');
                        }
                    });
            }});
        });
    </script>
@endpush
