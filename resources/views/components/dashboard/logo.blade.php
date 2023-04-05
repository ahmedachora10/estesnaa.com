<img src="{{ $image ?? asset(str_replace('public/', 'storage/', setting('logo'))) }}" {{ $attributes }}>
