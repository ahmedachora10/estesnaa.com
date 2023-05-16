<div>
    <x-dashboard.tables.table1 title="sidebar.countries" :action="route('countries.create')" :columns="['name', 'flag', 'status', 'actions']">
        @forelse ($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>
                    <span class="badge bg-label-dark" style="cursor: pointer">
                        @if ($country->flag)
                            <x-country-flag :flag="$country->flag" :name="$country->name" />
                        @else
                            -
                        @endif
                    </span>
                </td>
                <td> <span class="badge bg-label-{{ $country->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $country->id }})">{{ $country->status->name() }}</span>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('countries.edit', $country->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('countries.destroy', $country->id)" />
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
        {{ $countries->links() }}
    </div>
</div>
