@php
    $isAdmin = auth()->user()->role == 'admin';
    if ($isAdmin) {
        $columns = ['image', 'name', 'owner', 'price', 'discount', 'status', 'actions'];
    } else {
        $columns = ['image', 'name', 'price', 'discount', 'status', 'actions'];
    }
@endphp

<div>
    <x-dashboard.tables.table1 title="sidebar.inventions" :action="route('inventions.create')" :columns="$columns">
        @forelse ($inventions as $invention)
            <tr>
                <td><img src="{{ asset($invention->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $invention->name }}</td>
                @if ($isAdmin)
                    <td><span class="badge badge bg-label-success">{{ $invention->owner->name }}</span></td>
                @endif
                {{-- <td><span class="badge badge bg-label-primary">{{ $invention->category->name }}</span></td> --}}
                <td>
                    <span class="badge badge bg-label-info fw-bold">{{ $invention->price }}$</span>
                </td>

                <td>
                    <span class="badge badge bg-label-dark fw-bold">{{ $invention->discount }}%</span>
                </td>

                <td>
                    @if ($isAdmin || (!is_null($userPlan) && !$userPlan->expired))
                        <span class="badge badge bg-label-{{ $invention->status->color() }}" style="cursor: pointer"
                            wire:click="updateStatus({{ $invention->id }})">{{ $invention->status->name() }}</span>
                    @else
                        <span class="badge badge bg-label-warning" style="cursor: pointer"><i
                                class="bx bx-low-vision"></i></span>
                    @endif
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

    <div class="mt-4" style="margin-right: -40px">
        {{ $inventions->links() }}
    </div>
</div>
