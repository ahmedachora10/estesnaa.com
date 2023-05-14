<x-app-layout>

    <x-dashboard.cards.sample column="col-12">
        @livewire('dashboard.categories-container')
    </x-dashboard.cards.sample>


    <x-sortable-script model="category" />

</x-app-layout>
