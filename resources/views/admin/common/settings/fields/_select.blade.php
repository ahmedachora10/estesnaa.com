<div
    class="form-group mb-3 {{ $field['parent_class'] ?? 'col-md-6 ' }} {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] ?? '' }}"
        class="mb-2">{{ trans('settings.' . strtolower($field['label'] ?? '')) }}</label>

    <x-select type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}"
        value="{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}" class="{{ $field['class'] ?? '' }}"
        id="{{ $field['name'] ?? '' }}">
        <option value="1" @selected(setting('about_status') == 1)>اضهار</option>
        <option value="0" @selected(setting('about_status') == 0)>اخفاء</option>
    </x-select>
    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>
