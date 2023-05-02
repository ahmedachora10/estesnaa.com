<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث الفعالية">
        <form action="{{ route('deceased.update', $deceased) }}" method="post" class="row"
            enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="col-md-8 col-12 mx-auto">
                @if ($deceased->image)
                    <img src="{{ asset($deceased->image) }}" alt="image" class=" img-thumbnail" width="110px"
                        height="110px">
                @endif
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="file" name="image" :title="trans('table.columns.image')" />
            </div> {{-- / Image --}}


            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$deceased->name" type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}


            <div class="col-md-12 col-12 mb-3">
                <x-text-area-group :value="$deceased->description" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}


            {{-- <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    @continue(auth()->user()->role == 'event' && $status->value == App\Casts\Status::ENABLED->value && !auth()->user()->plan)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $deceased->status->value">
                        {{ $status->name() }}
                    </x-input-radio>
                @endforeach
                <x-error field="status" class="d-block" />
            </div> --}}



            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>

        </form>

    </x-dashboard.cards.sample>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/ar.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'), {
                    language: 'ar',
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-app-layout>
