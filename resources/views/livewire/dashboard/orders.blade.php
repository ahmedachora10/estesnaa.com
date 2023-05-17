<div class="card">
    <div class="row row-bordered g-0">
        @if (in_array(auth()->user()->role, ['inventor', 'admin']))
            <div @class([
                'col-md-6' => auth()->user()->role == 'admin',
                'col-12' => auth()->user()->role != 'admin',
            ])>
                <div class="card-header d-flex align-items-center justify-content-between mb-4">
                    <h5 class="card-title m-0 me-2">مبيعات <span class="text-primary">الاختراعات</span></h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="topSales" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topSales">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @forelse ($inventionsOrders as $order)
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset($order->invention->image) }}" alt="oneplus">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $order->invention->name }}</h6>
                                        <small
                                            class="text-muted d-block mb-1">{{ $order->invention->category->name }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <span class="badge bg-label-primary">{{ $order->amount }}</span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-unstyled">{{ trans('table.empty') }}</li>
                        @endforelse

                    </ul>
                </div>
            </div>
        @endif

        @if (in_array(auth()->user()->role, ['service_provider', 'admin']))
            <div @class([
                'col-md-6' => auth()->user()->role == 'admin',
                'col-12' => auth()->user()->role != 'admin',
            ])>
                <div class="card-header d-flex align-items-center justify-content-between mb-4">
                    <h5 class="card-title m-0 me-2"> مبيعات <span class="text-primary">الخدمات</span></h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="topVolume" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topVolume" style="">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @forelse ($servicesOrders as $order)
                            @continue(!$order->service)
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset($order->service->image) }}" alt="ENVY Laptop" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $order->service->name }}</h6>
                                        <small
                                            class="text-muted d-block mb-1">{{ $order->service->category->name }}}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-3">
                                        <span class="badge bg-label-primary">{{ $order->amount }}</span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-unstyled">{{ trans('table.empty') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
