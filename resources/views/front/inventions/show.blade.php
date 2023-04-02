<x-front>
    <x-breadcrumb :title="$invention->name" />

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-12 col-md-12">
                    <div class="menubuy-body">
                        <div class="menubuy-img">
                            <img src="{{ asset($invention->image) }}" alt="" style="height:250px; width:250px">
                        </div>
                        <div class="socialmedia-buttons smw_left">
                            <a href="#"><i class="fa fa-share-alt"></i></a>
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                        <div class="provider-title">
                            <h4>{{ $invention->name }}</h4>
                            <h3>$ {{ $invention->original_price }}</h3>
                        </div>
                        <div class="provider-ditle">
                            <p>{{ $invention->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 text-center">
                    <a href="#" class="btn btn-light" role="button" aria-pressed="true">اشتري الان</a>
                </div>

            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
