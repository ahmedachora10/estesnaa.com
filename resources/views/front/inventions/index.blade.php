<x-front>

    <x-breadcrumb title="بيع الاختراعات" />
    <main id="main-provider">
        <section id="services-buy" class="services-buy">
            <div class="container">
                <div class="row">
                    @foreach ($inventions as $invention)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="menubuy-body">
                                <div class="provider-img" style=" position: unset !important">
                                    <img src="{{ asset($invention->image) }}" alt=""
                                        style="height:250px; width:250px;">
                                </div>
                                <div class="provider-title">
                                    <h4>{{ $invention->name }}</h4>
                                    <h3>${{ $invention->original_price }}</h3>
                                </div>
                                <div class="provider-link">
                                    <a href="{{ route('front.inventions.show', $invention) }}" class="btn btn-light"
                                        role="button" aria-pressed="true">اشتري الان</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
