<x-app-layout>

    <x-dashboard.cards.sample column="col-12">
        @livewire('dashboard.restore-services-container')
    </x-dashboard.cards.sample>

    <x-sortable-script model="service" />

</x-app-layout>
