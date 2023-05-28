<x-app-layout>

    <div class="alert alert-warning d-flex" role="alert">
        <span class="badge badge-center rounded-pill bg-warning border-label-warning p-3 me-2"><i
                class="bx bx-command fs-6"></i></span>
        <div class="d-flex flex-column ps-1">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">امل ان تكون الفعاليات باللغة العربية او تكون
                هناك ترجمة باللغة العربية!</h6>
            <span>المرجو الكتابة باللغة العربية فقط وشكرا.</span>
        </div>
    </div>

    <x-dashboard.cards.sample column="col-12" title="فعالية جديد">
        <form action="{{ route('events.store') }}" method="post" class="row" enctype="multipart/form-data">
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
                <x-input-group type="text" name="title" title="عنوان الفعالية" />
            </div> {{-- / Title --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="address" title="مقر الفعالية" />
            </div> {{-- / Address --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="date" :title="trans('table.columns.date')" />
            </div> {{-- / Date --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="time" name="time" title="التوقيت (توقيت المكة المكرمة)" />
            </div> {{-- / Time --}}

            <div class="col-md-12 col-12 mb-3">
                <x-text-area-group name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}


            @if (auth()->user()->role == 'admin')
                <div class="col-12 mb-3 mt-4">
                    <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                    @foreach (App\Casts\Status::cases() as $status)
                        @continue(auth()->user()->role == 'event' && $status->value == App\Casts\Status::ENABLED->value && !auth()->user()->plan)
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

    @push('styles')
        <link href="{{ asset('hijri-datepicker/dist/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />
    @endpush


    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
        <script src="{{ asset('hijri-datepicker/dist/js/bootstrap-hijri-datepicker.min.js') }}"></script>

        <script script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/ar.js"></script>



        <script>
            ClassicEditor
                .create(document.querySelector('#description'), {
                    language: 'ar'
                })
                .catch(error => {
                    console.error(error);
                });

            $(function() {
                $("#date").hijriDatePicker();
            });
        </script>
    @endpush

</x-app-layout>
