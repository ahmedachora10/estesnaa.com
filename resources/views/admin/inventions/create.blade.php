<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="اختراع جديد">
        <form action="{{ route('inventions.store') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="file" name="image" :title="trans('table.columns.image')" />
            </div> {{-- / Image --}}

            <div class="col-md-6 mb-3 mb-3">
                <x-select-group name="category_id" title="table.columns.category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select-group>
            </div> {{-- / Categories --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="name" title="اسم الاختراع" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" name="price" :title="trans('table.columns.price')" />
            </div> {{-- / Price --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="number" name="discount" :title="trans('table.columns.discount')" />
            </div> {{-- / Discount --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="keywords" :title="trans('table.columns.keywords')" />
            </div> {{-- / Keywords --}}

            <div class="col-md-12 col-12 mb-3">
                <x-text-area-group name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            @if (auth()->user()->role == 'admin')
                <div class="col-12 mb-3 mt-4">
                    <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                    @foreach (App\Casts\Status::cases() as $status)
                        <x-input-radio name="status" :value="$status->value" checked>
                            {{ $status->name() }}
                        </x-input-radio>
                    @endforeach
                    <x-error field="status" class="d-block" />
                </div> {{-- / Status --}}
            @else
                <x-text-input type="hidden" name="status" :value="App\Casts\Status::DISABLED->value" />
            @endif


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
                    language: 'ar'
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-app-layout>
