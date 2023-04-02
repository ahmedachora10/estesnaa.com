<x-app-layout>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/pages/profile-banner.png"
                        alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset($user->avatar) }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $user->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold mx-2">
                                        <i class="bx bx-phone"></i> {{ $user->phone }}
                                    </li>
                                    <li class="list-inline-item fw-semibold mx-2">
                                        <i class="bx bx-envelope"></i> {{ $user->email }}
                                    </li>
                                    <li class="list-inline-item fw-semibold mx-2">
                                        <i class="bx bx-calendar-alt"></i>
                                        {{ $user->created_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-dashboard.cards.sample column="col-12" title="تحديث البيانات الشخصية">
        <form action="{{ route('users.profile') }}" method="post" class="row" enctype="multipart/form-data">
            @csrf

            {{-- <div class="col-md-8 col-12 mx-auto">
                @if ($user->avatar)
                    <img src="{{ asset($user->avatar) }}" alt="avatar" class=" img-thumbnail" width="80px"
                        height="80px">
                @endif
            </div> --}}

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
                <x-input-group :value="$user->phone" type="phone" name="phone" :title="trans('table.columns.phone')" />
            </div> {{-- / Phone --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="password" name="password" :title="trans('table.columns.password')" />
            </div> {{-- / Password --}}

            <div class="col-md-6 col-12 mb-3">
                <x-input-group type="password" name="password_confirmation" :title="trans('table.columns.password confirmation')" />
            </div> {{-- / Confirm Password --}}

            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>

        </form>

    </x-dashboard.cards.sample>

    @push('component-styles')
        <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    @endpush

</x-app-layout>
