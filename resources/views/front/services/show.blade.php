<x-front>
    <x-breadcrumb :title="$service->name" />
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row justify-content-between align-items-center mt-4 mb-4">
                <div class="col-md-8 mt-2">
                    <h2 class="fs-2 fw-bold lh-sm mb-0">{{ $service->name }}</h2>
                </div>

                <div class="col-md-4 mt-2">
                    <a href="{{ route('payment.service.order', $service) }}" class="btn btn-warning float-start fw-bold"
                        style="font-size: 14px">
                        <i class="fas fa-basket-shopping ms-2"></i>
                        اشتري الخدمة
                    </a>
                </div>
            </div>

            <hr class="text-secondary">

            <div class="row gy-4 mt-5">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="ratio ratio-16x9 shadow">
                                <img src="{{ asset($service->image) }}" alt="image" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="bg-white">
                        <div class="border-bottom py-3 px-3 bg-light">
                            <h6 class="fw-bold my-0" style="font-size: 14px;">بطاقة الخدمة</h6>
                        </div>

                        <div class="portfolio-info">
                            <ul>
                                <li><span class="fw-bold">التصنيف</span>: {{ $service->category->name }}</li>
                                <li><span class="fw-bold">السعر</span>: <span class="text-success fw-bold"
                                        style="font-size: 18px">{{ $service->price }}$</span></li>
                                <li><span class="fw-bold">التاريخ</span>: {{ $service->created_at->diffForHumans() }}
                                </li>
                            </ul>
                        </div>

                        <div class="border-top py-3 px-3 bg-light">
                            <h6 class="fw-bold my-0" style="font-size: 14px;">صاحب الخدمة</h6>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top p-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($service->owner->image) }}" alt="user avatar" class="rounded-circle"
                                    width="40" height="40">
                                <a href="#!" class="fs-6 text-dark me-2"
                                    style="font-weight: 500">{{ $service->owner->name }}</a>
                            </div>
                            @if (auth()->check() && auth()->id() != $service->user_id)
                                <div>
                                    <a href="{{ route('chat.new', [$service->user_id, $service->id]) }}"
                                        class="btn btn-outline-success py-1 fw-bold rounded-1" style="font-size: 14px">
                                        تواصل
                                    </a>
                                </div>
                            @endif

                            @guest
                                <div>
                                    <a href="{{ route('login') }}" class="btn btn-outline-dark py-1 fw-bold rounded-1"
                                        style="font-size: 14px">
                                        تواصل
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="my-3 bg-white pb-3">
                        <h3 class="text-white w-100 px-3 py-2" style="background-color: #021c3b">من نحن</h3>
                        <div class="description-container px-3">
                            {!! $service->owner->description !!}
                        </div>
                    </div>

                    <div class="my-3 bg-white pb-3">
                        <h3 class="text-white w-100 px-3 py-2" style="background-color: #021c3b"> خدماتنا المقدمة
                            للمخترعين </h3>
                        <div class="description-container my-3 px-3">
                            {!! $service->description !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
