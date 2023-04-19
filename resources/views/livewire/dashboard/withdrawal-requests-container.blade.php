@php
    $columns = ['ID', 'user', 'email', 'amount', 'status', 'actions'];
@endphp
<div>
    <x-dashboard.tables.table1 title="sidebar.requests" :columns="$columns">
        @forelse ($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td><span class="badge bg-label-primary fw-bold">{{ $request->user->name }}</span></td>

                <td><span class="badge badge bg-label-info fw-bold"> {{ $request->email }} </span></td>

                <td><span class="badge bg-label-danger fw-bold"> ${{ $request->amount }} </span></td>

                <td>
                    <button class="btn btn-outline-{{ $request->status->color() }} btn-sm fw-bold dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer">
                        {{ $request->status->name() }} </button>

                    <ul class="dropdown-menu" style="">

                        @foreach ($types as $type)
                            @continue($type->value == $request->status->value)
                            <li><a wire:click="updateStatus({{ $request->id }}, {{ $type->value }})"
                                    class="dropdown-item text-{{ $type->color() }}"
                                    href="javascript:void(0);">{{ $type->name() }}</a></li>
                        @endforeach

                    </ul>
                </td>

                <td>
                    <x-dashboard.actions.container>
                        {{-- <x-dashboard.actions.edit :href="route('events.edit', $request->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('events.destroy', $request->id)" /> --}}
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
        {{ $requests->links() }}
    </div>
</div>
