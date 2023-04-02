<div
    class="form-group mb-3 {{ $field['parent_class'] ?? 'col-md-6 ' }} {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">

    <label for="{{ $field['name'] ?? '' }}"
        class="mb-2">{{ trans('settings.' . strtolower($field['label'] ?? '')) }}</label>

    <textarea class="form-control {{ $field['class'] ?? '' }}" name="{{ $field['name'] ?? '' }}" rows="8"
        id="{{ $field['name'] ?? '' }}" placeholder="{{ $field['label'] ?? '' }}">{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}</textarea>

    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>
