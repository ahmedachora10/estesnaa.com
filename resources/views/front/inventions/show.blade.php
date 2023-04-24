<x-front>
    <x-breadcrumb :title="$invention->name" />

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="d-flex justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="d-flex justify-content-between align-items-center mb-5 rounded p-3"
                        style="background-color: #EFE7D3">
                        <span class="fw-bold fs-4" style="color:#673AB7">السعر:
                            ${{ $invention->original_price }}</span>
                        <a href="{{ route('payment.invention.order', $invention) }}" class="btn btn-danger py-1 fw-bold"
                            style="font-size: 14px" role="button" aria-pressed="true">اشتري الان</a>
                    </div>
                    {{-- Title --}}
                    <h1 class="fw-bold fs-2 mb-3 pb-3 border-bottom">{{ $invention->name }}</h1>

                    {{-- Owner & Social buttons --}}
                    <div class="mb-5 mt-4">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($invention->owner->image) }}" alt=""
                                        class="rounded-circle ms-3" style="width: 30px; height:30px">
                                    <h6>{{ $invention->owner->name }}</h6>
                                </div>
                                <div class="d-flex mt-2">
                                    <span class="text-secondary d-block ms-3" style="font-size: 14px">
                                        نشر ب {{ $invention->created_at->format('m/d/Y h:i A') }}
                                    </span>
                                    <a href="#" style="font-size: 14px"><i class="fa fa-eye ms-1"
                                            aria-hidden="true"></i>
                                        {{ views_for_humans($invention->views) }}</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="#"><i class="fa fa-share-alt text-primary"></i></a>
                                    <a href="#" class="me-3"><i class="far fa-heart text-danger"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <img src="{{ asset($invention->image) }}" class="w-100">
                    </div>

                    <article class="mt-5 description-container">
                        {!! $invention->description !!}
                    </article>
                    {{-- <div class="menubuy-body">
                        <div class="menubuy-img">
                            <img src="{{ asset($invention->image) }}" alt="" style="height:250px; width:250px">
                        </div>
                        <div class="socialmedia-buttons smw_left">
                            <a href="#"><i class="fa fa-share-alt"></i></a>
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-eye ms-1" aria-hidden="true"></i>
                                {{ views_for_humans($invention->views) }}
                            </a>
                        </div>
                        <div class="provider-title">
                            <h4>{{ $invention->name }}</h4>
                            <h3>$ {{ $invention->original_price }}</h3>
                        </div>
                        <div class="provider-ditle">
                            <p>{{ $invention->description }}</p>
                        </div>
                    </div> --}}
                </div>

                {{-- <div class="col-lg-12 text-center">
                    <a href="{{ route('payment.invention.order', $invention) }}" class="btn btn-light" role="button"
                        aria-pressed="true">اشتري الان</a>
                </div> --}}

            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
