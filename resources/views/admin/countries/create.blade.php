<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="دولة جديد">
        <form action="{{ route('countries.store') }}" method="post" class="row">
            @csrf

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="flag" :title="trans('table.columns.flag')" placeholder="Saudi Arabia: sa" />
                <div id="defaultFormControlHelp" class="form-text">
                    تجد علم كل الدول <a class="form-text text-danger" target="_blank"
                        href="https://flagcdn.com/en/codes.json">هنا</a>
                </div>
            </div> {{-- / Flag --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="status" class="d-block">{{ trans('table.columns.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio name="status" :value="$status->value" checked>
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
