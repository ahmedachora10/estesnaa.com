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

    <div class="row">
        <div @class([
            'col-md-6' => $user->role == 'inventor' || $user->role == 'admin',
            'col-md-12' => !in_array($user->role, ['inventor', 'admin']),
        ])>
            <x-dashboard.cards.sample column="col-12">
                <h4>تحديث البيانات الشخصية</h4>
                <form action="{{ route('users.profile') }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf

                    @if ($user->role != 'inventor')
                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->avatar" type="file" name="avatar" :title="trans('table.columns.image')" />
                        </div> {{-- / Avatar --}}
                    @else
                        <input type="file" name="avatar" hidden>
                    @endif

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

            @if ((auth()->user()->role == 'admin' && $user->role == 'inventor') || $user->role == 'inventor')
                <x-dashboard.cards.sample column="col-12">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h4>
                            شهادة المخترع
                        </h4>
                        @livewire('dashboard.certificate-status-button', ['user' => $user])
                    </div>
                    <div class="mt-2">
                        <a href="{{ asset($user->inventorProfile->file) }}" target="_blank">
                            <i class="bx bx-file"></i> عرض
                            الملف
                        </a>
                    </div>

                </x-dashboard.cards.sample>
            @endif

        </div>

        @if (
            (auth()->user()->role == 'admin' && $user->role == 'inventor') ||
                ($user->role == 'inventor' && $inventorProfilePlan))
            <div class="col-6">
                <x-dashboard.cards.sample column="col-12">
                    <h4>التعريف بالمخترع</h4>
                    <form action="{{ route('inventors.profile') }}" method="post" class="row"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($user->inventorProfile->video != null)
                            <div class="col-12 mb-3">
                                <iframe src="{{ asset($user->inventorProfile->video) }}" width="100%" height="300px"
                                    controls>
                                </iframe>
                            </div>
                        @endif

                        <div class="col-12 mb-3">
                            <x-input-group :value="$user->inventorProfile->video" type="file" name="video" :title="trans('table.columns.video')" />
                        </div> {{-- / video --}}

                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->avatar" type="file" name="avatar" :title="trans('table.columns.image')" />
                        </div> {{-- / Avatar --}}

                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->file" type="file" name="file" :title="trans('table.columns.certificate')" />
                        </div> {{-- / CV Or Certificate --}}

                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->inventorProfile->facebook" type="text" name="facebook" :title="trans('settings.facebook')" />
                        </div> {{-- / Social Media --}}

                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->inventorProfile->twitter" type="text" name="twitter" :title="trans('settings.twitter')" />
                        </div> {{-- / Social Media --}}

                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->inventorProfile->instagram" type="text" name="instagram" :title="trans('settings.instagram')" />
                        </div> {{-- / Social Media --}}

                        <div class="col-md-6 col-12 mb-3">
                            <x-input-group :value="$user->inventorProfile->whatsapp" type="text" name="whatsapp" :title="trans('settings.whatsapp')" />
                        </div> {{-- / Social Media --}}

                        <div class="col-md-12 col-12 mb-3">
                            <x-text-area-group name="description" :title="trans('settings.description')" :value="$user->inventorProfile->description">
                            </x-text-area-group>
                        </div> {{-- / Social Media --}}



                        <div class="col-12">
                            <x-dashboard.button type="submit" name="Save" class="btn-primary" />
                        </div>

                    </form>
                </x-dashboard.cards.sample>
            </div>
        @elseif($user->role == 'inventor' && !$inventorProfilePlan)
            <div class="col-md-6">
                <x-dashboard.cards.sample column="col-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="form-check custom-option custom-option-icon checked shadow bg-white">
                            <label class="form-check-label custom-option-content" for="customRadioSvg1">
                                <span class="custom-option-body">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/paypal.png"
                                        class="w-px-40 mb-2" alt="paypal">
                                    <span class="custom-option-title"> التعريف بالمخترعين </span>
                                    <small>Cake sugar plum fruitcake I love sweet roll jelly-o.</small>
                                </span>

                                <a href="{{ route('front.inventor.profile.plan') }}"
                                    class="btn btn-sm btn-outline-danger">
                                    <span class="tf-icons bx bx-package me-1"></span>
                                    الاشتراك
                                </a>
                            </label>
                        </div>
                    </div>
                </x-dashboard.cards.sample>
            </div>


        @endif

    </div>

    @push('component-styles')
        <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    @endpush

    @if (in_array(auth()->user()->role, ['inventor', 'admin']) && $inventorProfilePlan)
        @push('component-styles')
            <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
            <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
                rel="stylesheet" />
        @endpush
        @push('component-scripts')
            <script
                src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.10/dist/filepond-plugin-image-preview.min.js">
            </script>
            <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
            <script src="{{ asset('assets/js/helpers.js') }}"></script>
        @endpush
        @push('scripts')
            <script defer>
                FilePond.registerPlugin(FilePondPluginImagePreview);

                const video = document.querySelector('#video');

                if (video != null) {
                    const videoBond = filePond(video, {
                        // required: true,
                        labelIdle: 'سحب وافلات فيديو تعريفي (*)<span class="filepond--label-action text-primary"> تصفح </span> ',
                    });

                    // Video Preview
                    // videoBond.preview(
                    //     "{{ asset($user->inventorProfile->video) }}",
                    //     "{{ str_replace('storage/inventors/videos/', '', $user->inventorProfile->video) }}",
                    //     'video'
                    // );

                    $("#video").on('change drop', () => {
                        videoBond.setOptions("{{ route('users.upload.video') }}");
                    });
                }
            </script>
        @endpush
    @endif

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/ar.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#description'), {
                    language: 'ar'
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-app-layout>
