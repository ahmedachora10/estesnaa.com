<x-app-layout>

    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <x-dashboard.cards.sample column="col-12" title="{{ __('general.New Role') }}">

            <div class="row">

                <div class="col-md-6 col-12 mb-3">
                    <x-input-group type="text" name="name" :title="trans('table.columns.name')" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-input-group type="text" name="display_name" :title="trans('table.columns.display name')" />
                </div> {{-- / Display Name --}}

                <div class="col-12 mb-3">
                    <x-input-group type="text" name="description" :title="trans('table.columns.description')" />

                </div> {{-- / Description --}}
            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>
        </x-dashboard.cards.sample>

    </form>

</x-app-layout>
