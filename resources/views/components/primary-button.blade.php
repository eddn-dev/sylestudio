{{-- resources/views/components/primary-button.blade.php --}}
<button {{ $attributes->merge([
        'type'  => 'button',
        'class' => 'btn-primary'
    ]) }}>
    {{ $slot }}
</button>
