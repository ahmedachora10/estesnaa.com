<x-app-layout>

    <x-dashboard.tables.table1 title="{{ __('sidebar.roles') }}" :action="route('roles.create')" :columns="['id', 'name', 'display name', 'description', 'actions']">
        @forelse ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>

                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('roles.edit', $role->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('roles.destroy', $role->id)" />
                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('No Roles') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>

</x-app-layout>
