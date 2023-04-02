@props(['checked' => null])

<div class="form-check form-check-inline mt-3">
    <input type="radio" {{ $attributes->merge(['class' => 'form-check-input']) }} @checked($checked)>
    {{-- <label class="form-check-label">{{ $slot }}</label> --}}
    <x-label class="form-check-label">{{ $slot }}</x-label>
</div>
