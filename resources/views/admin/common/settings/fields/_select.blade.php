<div
    class="form-group mb-3 {{ $field['parent_class'] ?? 'col-md-6 ' }} {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] ?? '' }}"
        class="mb-2">{{ trans('settings.' . strtolower($field['label'] ?? '')) }}</label>

    <x-select type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}"
        value="{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}" class="{{ $field['class'] ?? '' }}"
        id="{{ $field['name'] ?? '' }}">
        @foreach ($field['options'] ?? [] as $key => $option)
            <option value="{{ $key }}" @selected(setting($field['name'] ?? '') == $key)>{{ $option }}</option>
        @endforeach
    </x-select>
    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>
