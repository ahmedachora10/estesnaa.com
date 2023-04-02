<x-front>
    <x-breadcrumb title="الخدمات" />

    <section id="services" class="services">
        <div class="container">

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="services-body">
                            <div class="services-img">
                                <img src="{{ asset($service->image) }}" alt="" style="height:100px; width:150px">
                            </div>
                            <div class="services-title">
                                <h4><a href="{{ route('front.services.show', $service) }}">{{ $service->name }}</a>
                                </h4>
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
