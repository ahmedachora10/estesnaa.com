<x-front>
    <x-breadcrumb :title="$service->name" />
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ asset($service->image) }}" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="portfolio-description">
                        <h2>{{ $service->name }}</h2>
                        <p>{!! $service->description !!}</p>
                    </div>

                    <div class="portfolio-info">
                        <h3>معلومات الخدمة</h3>
                        <ul>
                            <li><strong>التصنيف</strong>: {{ $service->category->name }}</li>
                            <li><strong>التاريخ</strong>: {{ $service->created_at->format('Y-m-d H:i:s') }}</li>
                            <li>
                                <a href="http://estesnaaone.test.com/services-providers/3" class="btn btn-primary">عرض
                                    مقدمي الخدمة</a>
                            </li>
                        </ul>
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
