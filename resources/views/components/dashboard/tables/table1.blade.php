<div class="card">

    <div class="d-flex justify-content-between align-items-center">
        @if (!is_null($title))
            <h5 class="card-header">{{ trans($title) }}</h5>
        @endif

        {{-- Go to create page --}}
        @if (!is_null($action))
            <a href="{{ $action }}" class="btn btn-icon btn-primary mx-4 btn-sm ">
                <span class="tf-icons bx bx-plus"></span>
                {{-- {{ __('Add') }} --}}
            </a>
        @endif

        @if (!is_null($actions))
            {{ $actions }}
        @endif
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            @if (!empty($columns))
                <thead>
                    <tr>
                        @foreach ($columns as $col)
                            <th> {{ trans('table.columns.' . strtolower($col)) }} </th>
                        @endforeach
                    </tr>
                </thead>
            @endif

            <tbody class="table-border-bottom-0">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
