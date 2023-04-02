<x-front>

    <x-breadcrumb title="التعريف بالمخترعين" />

    @livewire('inventors-filter')

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
