<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title=" تحديث الدولة ">
        <form action="{{ route('countries.update', $country) }}" method="post" class="row"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$country->name" type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="flag" :value="$country->flag" :title="trans('table.columns.flag')" />
            </div> {{-- / Flag --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $country->status->value">
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
