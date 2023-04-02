<x-front>
    <x-breadcrumb title="الفعاليات" />

    @livewire('events-filter')

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
