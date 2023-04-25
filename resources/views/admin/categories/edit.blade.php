<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تصنيف جديد">
        <form action="{{ route('categories.update', $category) }}" method="post" class="row"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-8 col-12 mx-auto">
                @if ($category->image)
                    <img src="{{ asset($category->image) }}" alt="image" class=" img-thumbnail" width="110px"
                        height="110px">
                @endif
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="file" name="image" :title="trans('table.columns.image')" />
            </div> {{-- / Image --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$category->name" type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$category->description" type="text" name="description" :title="trans('table.columns.description')" />
            </div> {{-- / Description --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="parent_id" class="d-block">{{ trans('table.columns.section') }}</x-label>
                @foreach ($categoriesType as $type)
                    <x-input-radio name="parent_id" :value="$type->value" :checked="$category->parent_id && $type->value == $category->parent_id->value">
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
