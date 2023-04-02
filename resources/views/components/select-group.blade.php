@props(['title', 'name'])

<x-label :for="$name" class="d-block">{{ __($title) }}</x-label>

<x-select :name="$name">
    {{ $slot }}
</x-select>

<x-error :field="$name" class="d-block" />
