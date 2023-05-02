<div>
    <x-dashboard.tables.table1 title="sidebar.deceased" :action="route('deceased.create')" :columns="['image', 'name', 'actions']">
        @forelse ($deceasedInventors as $inventor)
            <tr>
                <td><img src="{{ asset($inventor->thumb) }}" alt="thumb" width="40" height="40"
                        class="rounded-circle"></td>
                <td>{{ $inventor->name }}</td>
                {{-- <td> <span class="badge badge bg-label-{{ $inventor->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $inventor->id }})">{{ $inventor->status->name() }}</span> --}}
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('deceased.edit', $inventor->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('deceased.destroy', $inventor->id)" />
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
        {{ $deceasedInventors->links() }}
    </div>
</div>
