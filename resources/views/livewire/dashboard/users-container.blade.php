<div>
    <x-dashboard.tables.table1 title="sidebar.users" :action="route('users.create')" :columns="['image', 'name', 'email', 'role', 'status', 'created at', 'actions']">

        @forelse ($users as $user)
            <tr>
                <td><img src="{{ asset($user->avatar) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($role = $user->roles->first())
                        {{ $role->display_name }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <div class="fw-bold text-{{ $user->status->color() }}">{{ $user->status->name() }} </div>
                </td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('users.edit', $user->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('users.destroy', $user->id)" />
                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4 float-end">
        {{ $users->links() }}
    </div>
</div>
