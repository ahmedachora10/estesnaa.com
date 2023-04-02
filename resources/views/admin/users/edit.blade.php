<x-app-layout>

    <x-dashboard.cards.sample column="col-12" title="تحديث مستخدم">
        <form action="{{ route('users.update', $user) }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            {{-- <div class="col-12">
                @livewire('admin.user-avatar', ['name' => 'avatar'])
            </div> --}}

            <div class="col-md-8 col-12 mx-auto">
                @if ($user->avatar)
                    <img src="{{ asset($user->avatar) }}" alt="avatar" class=" img-thumbnail" width="80px"
                        height="80px">
                @endif
            </div>

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$user->avatar" type="file" name="avatar" :title="trans('table.columns.image')" />
            </div> {{-- / Avatar --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$user->name" type="text" name="name" :title="trans('table.columns.name')" />
            </div> {{-- / Name --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$user->email" type="email" name="email" :title="trans('table.columns.email')" />
            </div> {{-- / Email --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group :value="$user->phone" type="text" name="phone" :title="trans('table.columns.phone')" />
            </div> {{-- / Phone --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="password" name="password" :title="trans('table.columns.password')" />
            </div> {{-- / Password --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="password" name="password_confirmation" :title="trans('table.columns.password confirmation')" />
            </div> {{-- / Confirm Password --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="role" class="d-block">{{ trans('sidebar.roles') }}</x-label>
                @foreach ($roles as $role)
                    <x-input-radio :checked="$user->roles->first() ? $user->roles->first()->id == $role->id : null" name="roles" :value="$role->id">
                        {{ $role->display_name }}
                    </x-input-radio>
                @endforeach
                <x-error field="roles" class="d-block" />
            </div> {{-- / Roles Group --}}

            <div class="col-12 mb-3 mt-4">
                <x-label for="role" class="d-block">{{ trans('sidebar.status') }}</x-label>
                @foreach (App\Casts\Status::cases() as $status)
                    <x-input-radio :checked="$status->value == $user->status->value" name="status" :value="$status->value">
                        {{ $status->name() }}
                    </x-input-radio>
                @endforeach
                <x-error field="status" class="d-block" />
            </div> {{-- / Status --}}


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>

        </form>

    </x-dashboard.cards.sample>

</x-app-layout>
