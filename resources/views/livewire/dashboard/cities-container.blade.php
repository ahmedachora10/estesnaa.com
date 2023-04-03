<div>
    <x-dashboard.tables.table1 title="sidebar.cities" :action="route('cities.create')" :columns="['name', 'country', 'status', 'actions']">
        @forelse ($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td> <span class="badge badge bg-label-info">{{ $city->country->name }}</span>
                <td> <span class="badge badge bg-label-{{ $city->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $city->id }})">{{ $city->status->name() }}</span>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('cities.edit', $city->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('cities.destroy', $city->id)" />
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
        {{ $cities->links() }}
    </div>
</div>
