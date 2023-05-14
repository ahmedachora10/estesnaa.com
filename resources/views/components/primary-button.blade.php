<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'd-flex align-items-center px-4 py-2 bg-success border rounded fw-bold text-white']) }}>
    {{ $slot }}
</button>
