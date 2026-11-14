<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger rounded-pill']) }}>
    {{ $slot }}
</button>
