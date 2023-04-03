@php
    $isAdmin = auth()->user()->role == 'admin';
    if ($isAdmin) {
        $columns = ['image', 'title', 'owner', 'category', 'status', 'actions'];
    } else {
        $columns = ['image', 'title', 'category', 'status', 'actions'];
    }
@endphp
<div>
    <x-dashboard.tables.table1 title="sidebar.events" :action="route('events.create')" :columns="$columns">
        @forelse ($events as $event)
            <tr>
                <td><img src="{{ asset($event->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $event->title }}</td>
                @if ($isAdmin)
                    <td><span class="badge badge bg-label-primary fw-bold">{{ $event->owner->name }}</span></td>
                @endif
                <td><span class="badge badge bg-label-info fw-bold"> {{ $event->category->name }} </span></td>
                <td class="text-{{ $event->status->color() }}">{{ $event->status->name() }}</td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('events.edit', $event->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('events.destroy', $event->id)" />
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
        {{ $events->links() }}
    </div>
</div>
