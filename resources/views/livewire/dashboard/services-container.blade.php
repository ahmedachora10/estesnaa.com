<div>
    <x-dashboard.tables.table1 title="sidebar.services" :action="route('services.create')" :columns="['image', 'name', 'owner', 'category', 'status', 'actions']">
        @forelse ($services as $service)
            <tr>
                <td><img src="{{ asset($service->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $service->name }}</td>

                <td><span class="badge badge bg-label-success">{{ $service->owner->name }}</span></td>
                <td><span class="badge badge bg-label-primary">{{ $service->category->name }}</span></td>

                <td> <span class="badge badge bg-label-{{ $service->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $service->id }})">{{ $service->status->name() }}</span>
                </td>

                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('services.edit', $service->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('services.destroy', $service->id)" />
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
