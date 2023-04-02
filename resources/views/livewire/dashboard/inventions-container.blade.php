<div>
    <x-dashboard.tables.table1 title="sidebar.inventions" :action="route('inventions.create')" :columns="['image', 'name', 'owner', 'category', 'price', 'discount', 'status', 'actions']">
        @forelse ($inventions as $invention)
            <tr>
                <td><img src="{{ asset($invention->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $invention->name }}</td>
                <td><span class="badge badge bg-label-success">{{ $invention->owner->name }}</span></td>
                <td><span class="badge badge bg-label-primary">{{ $invention->category->name }}</span></td>
                <td>
                    <span class="badge badge bg-label-info fw-bold">{{ $invention->price }}$</span>
                </td>

                <td>
                    <span class="badge badge bg-label-dark fw-bold">{{ $invention->discount }}%</span>
                </td>

                <td> <span class="badge badge bg-label-{{ $invention->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $invention->id }})">{{ $invention->status->name() }}</span>
                </td>


                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('inventions.edit', $invention->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('inventions.destroy', $invention->id)" />
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
