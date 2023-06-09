<div>
    <x-dashboard.tables.table1 title="sidebar.sliders" :action="route('sliders.create')" :columns="['image', 'title', 'description', 'status', 'actions']">
        @forelse ($sliders as $slider)
            <tr>
                <td>
                    <span data-id="{{ $slider->id }}"
                        class="target handle px-2 py-0 d-inline border me-2 cursor-pointer"><i
                            class="fas fa-sort"></i></span>
                    <img src="{{ asset($slider->image) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px">
                </td>
                <td>{{ str($slider->title)->limit(30) }}</td>
                <td>{{ $slider->description }}</td>
                <td class="text-{{ $slider->status->color() }}"> <button
                        class="btn btn-ms btn-{{ $slider->status->color() }}"
                        wire:click="updateStatus({{ $slider->id }})">{{ $slider->status->name() }}</button></td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit :href="route('sliders.edit', $slider->id)">{{ __('Edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('sliders.destroy', $slider->id)" />
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
        {{ $sliders->links() }}
    </div>
</div>
