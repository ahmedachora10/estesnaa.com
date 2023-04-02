<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث مدينة">
        <form action="{{ route('cities.update', $city) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$city->name" type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 mb-3">
                <x-select-group title="table.columns.country" name="country_id">
                    <option value="">اختر الدولة</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @selected($country->id == $city->country_id)>{{ $country->name }}</option>
                    @endforeach

                </x-select-group>
            </div> {{-- / Cities --}}


            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $city->status->value">
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
