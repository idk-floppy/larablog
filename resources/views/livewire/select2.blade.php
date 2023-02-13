<div>
    <select name="tags[]" id="tags" multiple
        class="select2 mt-1 w-full block rounded-md bg-gray-100 border-transparent hover:border-gray-500 hover:bg-white hover:ring-0">
        @foreach ($this->tagOptions as $tagOptions)
            <option value="{{ $tagOptions }}" selected>{{ $tagOptions }}</option>
        @endforeach
    </select>
    @if ($errors->has('tags'))
        <small class="text-red-600">{{ $errors->first('tags') }}</small>
    @endif
</div>

@push('scripts')
    <script type="module">
        $(document).ready(() => {
            $("#tags").select2({
                placeholder: "Select tags",
                tags: true,
                maximumSelectionLength: 5,
                tokenSeparators: [],
                ajax: {
                    delay: 300,
                    url: '/api/search',
                    data: (params) => {
                        var query = {
                            search: params.term
                        }
                        return query;
                    },
                    processResults: (data) => {
                        var newData = $.map(data, (obj) => {
                            obj.id = obj.text;
                        });
                        console.log(data);
                        return {
                            results: data
                        };
                    }
                },
                createTag: (params) => {
                    var regExp = /^[a-zA-Z0-9\ö\ü\ó\ő\ú\é\á\ű\í]+$/g;
                    if (!regExp.test(params.term) || params.term.length > 32) {
                        return null;
                    }

                    return {
                        id: params.term.toLocaleLowerCase(),
                        text: params.term.toLocaleLowerCase()
                    }
                }
            });
        });
    </script>
@endpush
