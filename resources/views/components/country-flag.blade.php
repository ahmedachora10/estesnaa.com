@props(['flag' => 'ma', 'name' => 'morocco'])

<img src="https://flagcdn.com/16x12/{{ strtolower($flag) }}.png"
    srcset="https://flagcdn.com/32x24/{{ strtolower($flag) }}.png 2x,
    https://flagcdn.com/48x36/{{ strtolower($flag) }}.png 3x"
    width="16" height="12" alt="{{ $name }}">
