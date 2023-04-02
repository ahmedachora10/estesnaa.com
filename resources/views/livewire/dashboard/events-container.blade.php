<div>
    <x-dashboard.tables.table1 title="sidebar.events" :action="route('events.create')" :columns="['image', 'title', 'category', 'status', 'actions']">
        @forelse ($events as $event)
            <tr>
                <td><img src="{{ asset($event->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->category->name }}</td>
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
</div>
