<x-front>
    <x-breadcrumb title="الخدمات" />

    <section id="services" class="services">
        <div class="container">
            @auth
                @if (auth()->user()->role == 'service_provider')
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="{{ route('services.create') }}" class="btn custom-main-bg-color text-white"
                            style="width:200px">
                            اضافة الخدمة
                        </a>
                    </div>
                @endif
            @endauth
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex align-items-start">
                        <div class="services-body bg-white w-100 my-2 rounded shadow">
                            <div class="services-img p-3 shadow w-100"
                                style="border:10px solid #fff ;height: 150px; background-image:url({{ asset($service->image) }}); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                                {{-- <img src="{{ asset($service->image) }}" class="w-100" alt="thumb"> --}}
                            </div>
                            <div class="px-3 py-2">
                                <h3 class="mb-2 mt-2 fw-bold" style=" font-size: 16px;line-height: 1.3em;"><a
                                        href="{{ route('front.services.show', $service) }}"
                                        title="{{ $service->name }}">{{ str($service->name)->limit(21) }}</a>
                                </h3>
                                <h6 class="text-secondary my-2" style="font-size:14px !important"><i
                                        class="fa fa-grid"></i>{{ $category->name }}</h6>

                                <div class="reviews mt-3">
                                    <ul class="list-unstyled d-flex justify-content-start mb-0">
                                        <li>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star fa-sm text-warning"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                        </li>
                                        <li>(4.7)</li>
                                    </ul>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                                    <div class="d-block text-secondary" style="font-size: 14px;">
                                        <span class="position-relative" style="top: -2px">المشترين :</span>
                                        <span class="text-primary fw-bold">{{ $service->orders_count }}</span>
                                    </div>
                                    <a href="{{ route('front.services.show', $service) }}" class="text-primary fw-bold"
                                        style="font-size: 14px">التفاصيل
                                        <i class="fa fa-arrow-left position-relative mx-1" style="top: 2px"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
