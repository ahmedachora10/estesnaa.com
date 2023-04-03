<div>
    <x-dashboard.tables.table1 title="sidebar.featured" :action="route('featuredservices.create')" :columns="['title', 'icon', 'status', 'actions']">
        @forelse ($featuredServices as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td> <span class="badge badge bg-label-warning">
                        @if ($service->icon)
                            <i class="{{ $service->icon }} bx-tada-hover"></i>
                        @else
                            -
                        @endif
                    </span>
                <td> <span class="badge badge bg-label-{{ $service->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $service->id }})">{{ $service->status->name() }}</span>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('featuredservices.edit', $service->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('featuredservices.destroy', $service->id)" />
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
        {{ $featuredServices->links() }}
    </div>
</div>
