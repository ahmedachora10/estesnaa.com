<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث صفحة">
        <form action="{{ route('pages.update', $page) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="col-md-12 col-12 mb-3">
                <x-input-group :value="$page->title" type="text" name="title" :title="trans('table.columns.title')" />
            </div> {{-- / Title --}}

            <div class="col-md-12 col-12 mb-3">
                <x-text-area-group :value="$page->content" name="content" :title="trans('table.columns.content')" />
            </div> {{-- / Content --}}


            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    @continue($status->value == App\Casts\Status::PENDING->value)
                    <x-input-radio name="status" :value="$status->value" :checked="$status->value == $page->status->value">
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

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/ar.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#content'), {
                    language: 'ar',
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-app-layout>
