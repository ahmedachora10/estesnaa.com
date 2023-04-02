<li @class([
    'menu-header small fw-semibold d-flex flex-row',
    'justify-content-end' => app()->getLocale() == 'ar',
])>
    {{ $slot }}
</li>

@once('styles')
    @if (app()->getLocale() == 'ar')
        <style>
            .bg-menu-theme .menu-header:before {
                content: '';
                right: 0;
                left: unset;
            }
        </style>
    @endif
@endonce
