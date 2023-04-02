@props(['type' => 'text', 'name', 'title', 'value' => null, 'placeholder' => null])

<x-label :for="$name">{{ __($title) }}</x-label>

<x-text-input :type="$type" :name="$name" :value="$value ?? old($name)" :id="$name" :placeholder="$placeholder" />

<x-error :field="$name" />
