<x-front>
    <x-breadcrumb title="المشتريات" />
    <section id="portfolio-details" class="portfolio-details mb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="row text-end">
                    @foreach ($purchases as $purchase)
                        @continue(!$purchase->service)
                        @php
                            $service = $purchase->service;
                        @endphp
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex align-items-start">
                            <div class="services-body bg-white w-100 my-2 rounded shadow">
                                <div class="services-img p-3 shadow w-100"
                                    style="border:10px solid #fff ;height: 150px; background-image:url({{ asset($service->image) }}); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                                    {{-- <img src="{{ asset($service->image) }}" class="w-100" alt="thumb"> --}}
                                </div>
                                <div class="px-3 py-2">
                                    <h3 class="mb-2 mt-2 fw-bold" style=" font-size: 16px;line-height: 1.3em;"><a
                                            href="{{ route('front.services.stage.index', $purchase) }}">{{ $service->name }}</a>
                                    </h3>
                                    {{-- <h6 class="text-secondary my-2" style="font-size:14px !important"><i
                                            class="fa fa-grid"></i>{{ $category->name }}</h6> --}}

                                    <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                                        <div></div>
                                        <a href="{{ route('front.services.stage.index', $purchase) }}"
                                            class="text-primary fw-bold" style="font-size: 14px">عرض الخدمة
                                            <i class="fa fa-arrow-left position-relative mx-1" style="top: 2px"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    @push('styles')
        {{-- <link rel="stylesheet" href="{{ asset('front/css/services.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
