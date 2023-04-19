<div>

    <div class="mb-3">
        <h4 class="pb-3 mb-2 border-bottom">البحث</h4>
        <div class="row justify-content-start align-items-start">
            <div class="me-2 my-3 col-auto">
                <h6>حالة المستخدمين</h6>
                <div class="d-flex justify-content-start align-items-center">
                    <a wire:click="filterByStatus('')"
                        class="badge bg-label-dark me-2 cursor-pointer @if (empty($status)) fw-bold border border-warning @endif">الكل</a>
                    @foreach (App\Casts\Status::cases() as $item)
                        <a wire:click="filterByStatus({{ $item->value }})"
                            class="badge bg-label-{{ $item->color() }} me-2 cursor-pointer @if ($item->value == $status) fw-bold border border-warning @endif">{{ $item->name() }}</a>
                    @endforeach
                </div>
            </div>

            <div class="me-2 my-3 col-auto">
                <h6>ادوار المستخدمين</h6>
                <div class="d-flex justify-content-start align-items-center">
                    <a wire:click="filterByRole('')" @class([
                        'badge me-2 cursor-pointer',
                        'bg-label-primary fw-bold' => empty($role),
                        'bg-label-dark' => !empty($role),
                    ])>الكل
                    </a>
                    @foreach ($roles as $item)
                        <a wire:click="filterByRole('{{ $item->name }}')"
                            @class([
                                'badge me-2 cursor-pointer',
                                'bg-label-primary' => $item->name == $role,
                                'bg-label-dark' => $item->name != $role,
                            ])>{{ $item->display_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-dashboard.tables.table1 title="sidebar.users" :action="route('users.create')" :columns="['image', 'name', 'email', 'role', 'status', 'created at', 'actions']">

        @forelse ($users as $user)
            <tr>
                <td><img src="{{ asset($user->avatar) }}" class=" rounded-circle" alt="avatar" width="30px"
                        height="30px"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="fw-bold badge bg-label-info">
                        @if ($role = $user->roles->first())
                            {{ $role->display_name }}
                        @else
                            -
                        @endif
                    </span>
                </td>
                <td>
                    <button class="btn btn-outline-{{ $user->status->color() }} btn-sm fw-bold dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer">
                        {{ $user->status->name() }} </button>

                    <ul class="dropdown-menu" style="">

                        @foreach (App\Casts\Status::cases() as $status)
                            @continue($status->value == $user->status->value)
                            <li><a wire:click="updateStatus({{ $user->id }}, {{ $status->value }})"
                                    class="dropdown-item text-{{ $status->color() }}"
                                    href="javascript:void(0);">{{ $status->name() }}</a></li>
                        @endforeach

                    </ul>
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

    <div class="mt-4" style="margin-right: -40px">
        {{ $users->links() }}
    </div>
</div>
