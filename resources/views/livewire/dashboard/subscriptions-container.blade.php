<div>
    <x-dashboard.tables.table1 title="sidebar.subscriptions" :columns="['subscriber', 'package', 'amount', 'duration', 'duration expiration', 'status', 'actions']">
        @forelse ($subscriptions as $subscription)
            <tr>
                <td><a href="#" class="badge bg-label-info">{{ $subscription->user->name }}</a></td>
                <td> <span class="badge bg-label-primary">{{ $subscription->package->name }}
                        - {{ $subscription->package->group }}</span></td>
                <td>
                    <span class="badge bg-label-dark">${{ $subscription->amount }} </span>
                </td>

                <td><span class="badge bg-label-info">{{ date_for_humans($subscription->package->duration) }} </span>
                </td>

                <td>
                    @php
                        $expired = $subscription->expired;
                    @endphp
                    <span class="badge fw-bold bg-label-{{ $expired ? 'secondary' : 'warning' }}">
                        {{ $expired ? '' : ' بعد' }} {{ $subscription->duration_time->diffForHumans() }}
                    </span>
                </td>
                <td><span class="badge bg-label-{{ $subscription->status->color() }}" style="cursor: pointer"
                        wire:click="updateStatus({{ $subscription }})">{{ $subscription->status->name() }}</span>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        {{-- <x-dashboard.actions.edit :href="route('subscriptions.edit', $subscription->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('subscriptions.destroy', $subscription->id)" /> --}}
                        <a onclick="if(confirm('هل تود حذف هذا العنصر؟')) { return true} else { return false }"
                            class="dropdown-item text-danger" wire:click="destroy({{ $subscription }})">
                            <i class="bx bx-trash me-1"></i> {{ __('Delete') }}</a>
                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4">
        {{ $subscriptions->links() }}
    </div>
</div>
