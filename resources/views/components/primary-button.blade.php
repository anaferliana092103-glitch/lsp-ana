<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-accent w-100']) }}>
    {{ $slot }}
</button>
