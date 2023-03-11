<form class="delete-modal-trigger" {{ $attributes->merge(['data-csrf' => '', 'data-object' => '', 'data-url' => '']) }}>
    <x-delete-button />
</form>
