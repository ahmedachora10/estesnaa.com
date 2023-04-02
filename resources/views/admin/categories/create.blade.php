<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تصنيف جديد">
        <form action="{{ route('categories.store') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="text" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="parent_id" class="d-block">{{ trans('table.columns.section') }}</x-label>
                @foreach ($categoriesType as $type)
                    <x-input-radio name="parent_id" :value="$type->value" checked>
                        {{ $type->name() }}
                    </x-input-radio>
                @endforeach
                <x-error field="parent_id" class="d-block" />
            </div> {{-- / CategoryType --}}

            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>

        </form>

    </x-dashboard.cards.sample>

</x-app-layout>
