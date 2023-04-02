@props(['name', 'title', 'value' => null])

<x-label :for="$name">{{ __($title) }}</x-label>

<textarea class="form-control" name="{{ $name }}" id="{{ $name }}" {{ $attributes }}>
    {{ $value ?? old($name) }}
</textarea>

<x-error :field="$name" />
