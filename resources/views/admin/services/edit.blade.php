<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث الاختراع">
        <form action="{{ route('services.update', $service) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="col-md-8 col-12 mx-auto">
                @if ($service->image)
                    <img src="{{ asset($service->image) }}" alt="image" class=" img-thumbnail" width="110px"
                        height="110px">
                @endif
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="file" name="image" :title="trans('table.columns.image')" />
            </div> {{-- / Image --}}

            <div class="col-md-6 mb-3 mb-3">
                <x-select-group name="category_id" title="table.columns.category">
                    @foreach ($categories as $category)
                        <option @selected($service->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select-group>
                <x-error field="category_id" />
            </div> {{-- / Categories --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$service->name" type="text" name="name" title=" اسم الخدمة" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$service->keywords" type="text" name="keywords" :title="trans('table.columns.keywords')" />
            </div> {{-- / Keywords --}}

            <div class="col-md-12 col-12 mb-3">
                <x-input-group type="number" :value="$service->price" name="price" :title="trans('table.columns.price')" />
            </div> {{-- / Price --}}

            <div class="col-md-12 col-12 mb-3">
                <x-text-area-group :value="$service->description" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}


            @if (auth()->user()->role == 'admin')
                <div class="col-12 mb-3 mt-4">
                    <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                    @foreach (App\Casts\Status::cases() as $status)
                        <x-input-radio name="status" :value="$status->value" :checked="$status->value == $service->status->value">
                            {{ $status->name() }}
                        </x-input-radio>
                    @endforeach
                    <x-error field="status" class="d-block" />
                </div> {{-- / Status --}}
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
