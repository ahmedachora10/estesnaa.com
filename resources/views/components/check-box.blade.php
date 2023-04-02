@props(['checked' => null])

<div class="form-check form-check-inline">
    <input type="checkbox" {{ $attributes }} class="form-check-input" @checked($checked)>
    <x-label class="form-check-label"> {{ $slot }} </x-label>
</div>
