@php
    $isAdmin = auth()->user()->role == 'admin';
    if ($isAdmin) {
        $columns = ['image', 'name', 'owner', 'category', 'price', 'status', 'rating', 'actions'];
    } else {
        $columns = ['image', 'name', 'category', 'price', 'status', 'actions'];
    }
@endphp

<div>
    @if (session()->has('success'))
        <div class="messages alert alert-primary alert-dismissible mb-3" role="alert">
            {{ session()->get('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <x-dashboard.tables.table1 title="الخدمات المحذوفة" :columns="$columns">
        <x-slot:actions>
            <div class="d-flex jusitfy-content-end align-items-center">
                <x-text-input type="search" wire:model.debounce.125ms="search" class="mb-2 py-1"
                    placeholder="ابحث 'الاسم'" />
            </div>
            </x-slot>
            @forelse ($services as $service)
                <tr>
                    <td>
                        <span data-id="{{ $service->id }}"
                            class="target handle px-2 py-0 d-inline border me-2 cursor-pointer"><i
                                class="fas fa-sort"></i></span>
                        <img src="{{ asset($service->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                            height="30px">
                    </td>
                    <td title="{{ $service->name }}">{{ str($service->name)->limit(20) }}</td>
                    @if ($isAdmin)
                        <td><span class="badge badge bg-label-success">{{ $service->owner->name }}</span></td>
                    @endif
                    <td><span class="badge badge bg-label-primary">{{ $service->category->name }}</span></td>

                    <td><span class="badge badge bg-label-danger fw-bold">${{ $service->price }}</span></td>

                    <td> <span class="badge badge bg-label-{{ $service->status->color() }}" style="cursor: pointer"
                            wire:click="updateStatus({{ $service->id }})">{{ $service->status->name() }}</span>
                    </td>

                    @if ($isAdmin)
                        <td>
                            <x-dashboard.rating :id="$service->id" :rate="$service->rating_avg_rating ?? 0" />
                        </td>
                    @endif

                    <td>
                        <a href="#!" class="btn btn-sm btn-warning" wire:click="restore({{ $service->id }})"
                            title="استعادة"> <i class="bx bx-reset text-black"></i></a>
                        {{-- <x-dashboard.actions.container>
                            <x-dashboard.actions.edit :href="route('services.edit', $service->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                            <x-dashboard.actions.delete :route="route('services.destroy', $service->id)" />
                        </x-dashboard.actions.container> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td>{{ trans('table.empty') }}</td>
                </tr>
            @endforelse
    </x-dashboard.tables.table1>

    <div class="mt-4" style="margin-right: -40px">
        {{ $services->links() }}
    </div>
</div>
