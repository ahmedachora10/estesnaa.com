<div>
    <x-dashboard.tables.table1 title="sidebar.pages" :action="route('pages.create')" :columns="['title', 'status', 'actions']">
        @forelse ($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td> <span class="badge badge bg-label-{{ $page->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $page->id }})">{{ $page->status->name() }}</span>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('pages.edit', $page->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('pages.destroy', $page->id)" />
                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4" style="margin-right: -40px">
        {{ $pages->links() }}
    </div>
</div>
