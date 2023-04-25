<x-front>
    <x-breadcrumb title="الخدمات" />

    <section id="services" class="services">
        <div class="container">

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 d-flex align-items-start">
                        <div class="services-body bg-white shadow-sm w-100 mt-2 rounded">
                            <div class="services-img w-100"
                                style="height: 222px; background-image:url({{ asset($service->image) }}); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                                {{-- <img src="{{ asset($service->image) }}" class="w-100" alt="thumb"> --}}
                            </div>
                            <div class="px-3 py-4">
                                <h3 class="mb-2 fw-bold" style=" font-size: 20px;line-height: 1.3em;"><a
                                        href="{{ route('front.services.show', $service) }}">{{ $service->name }}</a>
                                </h3>
                                <h6 class="text-secondary"><i class="fa fa-grid"></i>{{ $category->name }}</h6>

                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div class="d-block fw-bold text-secondary"><span class="position-relative"
                                            style="top: -4px">السعر :</span>
                                        <span class="text-danger fs-4">{{ $service->price }}$</span>
                                    </div>
                                    <a href="{{ route('front.services.show', $service) }}"
                                        class="text-primary fw-bold">التفاصيل
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
