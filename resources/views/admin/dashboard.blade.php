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
                <div class="col-12 order-1 my-4 row justify-content-between mx-0">
                    <div class="col-lg-6 col-md-12 col-6 px-0">
                        <x-dashboard.cards.payment title="مدفوعات الاختراعات" :amount="$inventions_orders_total_amount"
                            icon="assets/img/icons/unicons/wallet.png" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 ps-0">
                        <x-dashboard.cards.payment title="مدفوعات الخدمات" :amount="$services_orders_total_amount"
                            icon="assets/img/icons/unicons/chart.png" />
                    </div>
                </div>
            @endif

            @if (in_array(auth()->user()->role, ['admin', 'inventor', 'service_provider']))
                <div class="col-12 order-2 my-4">
                    @livewire('dashboard.orders')
                </div>
            @endif

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
                    <div class="col-lg-6 col-md-6 col-6 mb-4">
                        <x-dashboard.cards.payment title="مبيعات الموقع" :amount="$total_amount" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-6 mb-4">
                        <x-dashboard.cards.payment title="ارباح الموقع من الخدمات" :amount="$platform_profit"
                            icon="assets/img/icons/unicons/cc-success.png" />
                    </div>

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

                @if (in_array(auth()->user()->role, ['service_provider', 'inventor']))
                    <x-dashboard.cards.payment title="الارباح" :amount="$user_bank_amount" id="user-profit-amount"
                        icon="assets/img/icons/unicons/paypal.png">
                        <x-slot:options>
                            <a class="dropdown-item text-info" href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#animationModal"> <i class="bx bxs-bank me-2"></i> <span
                                    class="position-relative" style="top: 1.5px">طلب
                                    سحب
                                    الارباح</span></a>
                        </x-slot:options>
                    </x-dashboard.cards.payment>
                @endif

                @if (auth()->user()->role == 'service_provider')
                    <x-dashboard.cards.payment title="الرصيد المعلق" class="mt-4" :amount="$service_provider_pending_balance"
                        id="user-pending-balance" icon="assets/img/icons/unicons/wallet.png">
                    </x-dashboard.cards.payment>
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

    @if (in_array(auth()->user()->role, ['service_provider', 'inventor']))
        <div class="modal animate__animated animate__fadeInDownBig" id="animationModal" tabindex="-1"
            style="display: none;" aria-hidden="true">
            @livewire('dashboard.request-withdrawal-user-money')
        </div>
    @endif
</x-app-layout>
