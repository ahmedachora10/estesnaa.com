<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث الفعالية">
        <form action="{{ route('sliders.update', $slider) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="col-md-8 col-12 mx-auto">
                @if ($slider->image)
                    <img src="{{ asset($slider->image) }}" alt="image" class=" img-thumbnail" width="110px"
                        height="110px">
                @endif
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="file" name="image" :title="trans('table.columns.image')" />
            </div> {{-- / Image --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$slider->title" type="text" name="title" :title="trans('table.columns.title')" />
            </div> {{-- / Title --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$slider->description" type="text" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $slider->status->value">
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
