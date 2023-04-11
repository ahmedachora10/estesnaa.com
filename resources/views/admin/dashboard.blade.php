<x-app-layout>
    <div class="row">
        <div class="col-lg-7 col-md-7  mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Wellcome back {{ auth()->user()->name }}</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge
                                in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transactions -->
            @if (auth()->user()->role == 'admin')
                <div class="col-12 order-2 my-4">
                    @livewire('dashboard.transaction')
                </div>
            @endif
            <!--/ Transactions -->
        </div>
        <div class="col-lg-5 col-md-5 order-1">
            <div class="row">
                {{-- Users --}}
                @if (auth()->user()->role == 'admin')
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="المستخدمين" description="كل المستخدمين" icon="bx bx-group"
                            :count="$admins_count" />
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الموظفين" description="كل الموظفين" :count="$employees_count"
                            color="success" />
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="المخترعين" description="كل المخترعين"
                            icon="bx bx-user-voice" :count="$inventors_count" color="danger" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الفاعلين" description="كل الفاعلين" icon="bx bx-user-voice"
                            :count="$events_count" color="warning" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="مقديمي الخدمات" description="كل مقديمي الخدمات"
                            icon="bx bx-user-voice" :count="$service_providers_count" color="info" />
                    </div>
                    {{-- / End Users --}}

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الأصناف" description="كل الأصناف" icon="bx bx-category"
                            :count="$categories_count" color="danger" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الفعاليات" description="كل الفعاليات"
                            icon="bx bx-calendar-event" :count="$events_providers_count" color="warning" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الباقات" description="كل الباقات" icon="bx bx-package"
                            :count="$packages_count" color="info" />
                    </div>
                @endif

                @if (auth()->user()->role == 'event')
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الفعاليات" description="كل الفعاليات"
                            icon="bx bx-calendar-event" :count="$events_count" color="warning" />
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">


    </div>

</x-app-layout>
