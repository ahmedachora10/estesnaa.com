<x-front>
    <x-breadcrumb title="المخترعين المتوفين" />

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-md-8 col-11 mx-auto">
                    <div class="card">
                        <div class="ratio ratio-16x9">
                            <img src="{{ asset($inventor->thumb) }}" class="card-img-top" alt="image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-0">{{ $inventor->name }}</h5>
                            <p class="card-text">
                                {!! $inventor->description !!}
                            </p>
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
