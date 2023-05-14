<x-app-layout>

    <x-dashboard.cards.sample column="col-12">
        @livewire('dashboard.sliders-container')
    </x-dashboard.cards.sample>


    <x-sortable-script model="slider" />

</x-app-layout>
