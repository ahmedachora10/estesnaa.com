<x-app-layout>

    <form action="{{ route('roles.update', $role) }}" method="post">
        <x-dashboard.cards.sample column="col-12" title=" {{ __('general.Update Role') }} ">

            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <x-input-group type="text" name="name" :title="trans('table.columns.name')" :value="$role->name" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-input-group type="text" name="display_name" :title="trans('table.columns.display name')" :value="$role->display_name" />
                </div> {{-- / Display Name --}}

                <div class="col-12 mb-3">
                    <x-input-group type="text" name="description" :title="trans('table.columns.description')" :value="$role->description" />
                </div> {{-- / Description --}}

                <div class="col-12">
                    <x-dashboard.button type="submit" name="Save" class="btn-primary" />
                </div>
            </div>

        </x-dashboard.cards.sample>


    </form>

</x-app-layout>
