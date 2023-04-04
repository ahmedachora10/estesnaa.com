<div>
    <x-dashboard.tables.table1 title="sidebar.packages" :action="route('packages.create')" :columns="['name', 'price', 'duration', 'discount', 'group', 'status', 'actions']">
        @forelse ($packages as $package)
            <tr>
                <td>{{ $package->name }}</td>
                <td> <span class="badge badge bg-label-danger fw-bold">{{ $package->price }}$</span></td>
                <td> <span class="badge badge bg-label-info fw-bold">{{ date_for_humans($package->duration) }}</span>
                </td>
                <td><span class="badge badge bg-label-secondary fw-bold">{{ $package->discount }}%</span></td>
                <td>
                    @if ($role_name = $roles->where('name', $package->group)->first())
                        <span class="badge badge bg-label-warning fw-bold">{{ $role_name->display_name }}</span>
                    @else
                        -
                    @endif
                </td>
                <td> <span class="badge badge bg-label-{{ $package->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $package->id }})">{{ $package->status->name() }}</span>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('packages.edit', $package->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('packages.destroy', $package->id)" />
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
        {{ $packages->links() }}
    </div>
</div>
