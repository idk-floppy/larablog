<div>
    <textarea name="content" id="{{ $tid }}" cols="30" rows="10" placeholder="Write something"
        class="mt-1 w-full block rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">{{ old('content') ?? $text }}</textarea>
    @if ($errors->has('content'))
        <small class="text-red-600">{{ $errors->first('content') }}</small>
    @endif
</div>

@push('scripts')
    <script type="module">
        $(document).ready(() => {
        // markdown editor init
        const easyMDE = new EasyMDE({
            toolbar: ['undo', 'redo', 'bold', 'italic', 'strikethrough', 'heading-smaller', 'heading-bigger', '|', 'code', 'quote', 'ordered-list', 'unordered-list', '|', 'link', 'horizontal-rule', '|', 'clean-block'],
            spellChecker: false,
            forceSync: true,
            element: document.getElementById(""+@this.tid)
        });
        easyMDE.codemirror.on('change', ()=>{
            document.getElementById(""+@this.tid).value = easyMDE.value();
        });
});
    </script>
@endpush
