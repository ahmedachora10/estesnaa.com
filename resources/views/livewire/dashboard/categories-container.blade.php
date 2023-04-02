<div>
    <x-dashboard.tables.table1 title="sidebar.categories" :action="route('categories.create')" :columns="['name', 'description', 'section', 'actions']">
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ? $category->description : '-' }}</td>
                <td>
                    @if ($category->parent_id)
                        <span class="badge bg-label-{{ $category->parent_id->color() }}">
                            {{ $category->parent_id->name() }}
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('categories.edit', $category->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('categories.destroy', $category->id)" />
                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>
</div>
