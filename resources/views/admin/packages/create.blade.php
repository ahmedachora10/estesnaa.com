<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="باقة جديدة">
        <form action="{{ route('packages.store') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-select-group name="group" :title="trans('table.columns.group')">
                    <option value="inventor_profile">التعريف بالمخترعين</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->name }}">{{ $group->display_name }}</option>
                    @endforeach
                </x-select-group>
            </div> {{-- / Group --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" name="price" :title="trans('table.columns.price')" />
            </div> {{-- / Price --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" name="discount" :title="trans('table.columns.discount')" />
            </div> {{-- / Discount --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" name="duration" :title="trans('table.columns.duration')" placeholder="حدد المدة بالايام" />
            </div> {{-- / Duration --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            <div class="col-md-12 col-12 mb-3">
                @livewire('package.features')
            </div> {{-- / Features --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" checked>
                        {{ $status->name() }}
                    </x-input-radio>
                @endforeach
                <x-error field="status" class="d-block" />
            </div> {{-- / Status --}}


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>

        </form>

    </x-dashboard.cards.sample>

</x-app-layout>
