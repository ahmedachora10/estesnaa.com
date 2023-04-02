<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث خاصية">
        <form action="{{ route('featuredservices.update', $featuredservice) }}" method="post" class="row"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$featuredservice->title" type="text" name="title" :title="trans('table.columns.title')" />
            </div> {{-- / Title --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$featuredservice->icon" type="text" name="icon" :title="trans('table.columns.icon')" />
            </div> {{-- / Icon --}}

            <div class="col-md-12 col-12 mb-3">
                <x-input-group :value="$featuredservice->description" type="text" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $featuredservice->status->value">
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
