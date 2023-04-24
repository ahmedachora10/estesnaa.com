<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث الباقة">
        <form action="{{ route('packages.update', $package) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$package->name" type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-select-group name="group" :title="trans('table.columns.group')">
                    <option @selected('inventor_profile' == $package->group) value="inventor_profile">التعريف بالمخترعين</option>
                    @foreach ($groups as $group)
                        <option @selected($group->name == $package->group) value="{{ $group->name }}">{{ $group->display_name }}
                        </option>
                    @endforeach
                </x-select-group>
            </div> {{-- / Group --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$package->price" type="number" name="price" :title="trans('table.columns.price')" />
            </div> {{-- / Price --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" :value="$package->discount" name="discount" :title="trans('table.columns.discount')" />
            </div> {{-- / Discount --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" :value="$package->duration" name="duration" :title="trans('table.columns.duration')"
                    placeholder="حدد المدة بالايام" />
            </div> {{-- / Duration --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="description" :value="$package->description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            <div class="col-md-12 col-12 mb-3">
                @livewire('package.features', ['mode' => 'update', 'features' => $package->features])
            </div> {{-- / Features --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $package->status->value">
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
