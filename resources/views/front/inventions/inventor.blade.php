<x-front>

    <div class="banner" style="background:url({{ asset('front/images/backgrounds/page-heading-bg.jpg') }});">
        <div class="person-name">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="provider-img" style="position: relative !important; right: -52px;">
                            <img src="{{ asset($inventor->avatar ?? 'front/images/inventors/635652.jpg') }}"
                                alt="" style="height:200px; width:200px">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="caption">
                            <div class="inner">
                                <h1>{{ $inventor->name }}</h1>
                                <h5 class="mt-1">
                                    @if ($inventor->inventorProfile)
                                        {{ views_for_humans($inventor->inventorProfile->views) }}
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="portfolio-details" class="portfolio-details" style="direction:rtl;margin-top:3%;margin-bottom:3%;">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4">
                    {{-- <div class="portfolio-info" style="background:#ffffff; padding-top: 0px !important">

                        <p>
                        </p>
                    </div> --}}


                    @if ($inventor->inventorProfile->video != null)
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ asset($inventor->inventorProfile->video) }}"
                                allowfullscreen="" autoplay="0"></iframe>
                        </div>
                    @endif
                </div>


                <div class="col-lg-8">


                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#hostiry" aria-controls="hostiry" data-toggle="tab">سيرة
                                شخصية</a>

                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#Congresses" aria-controls="Congresses"
                                data-toggle="tab">مؤتمرات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Research" aria-controls="Research" data-toggle="tab">مجموعات
                                البحث</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="hostiry">
                            <div class="description-container">
                                {!! $inventor->inventorProfile->description !!}
                            </div>

                            <hr>
                            <div class="social-media mt-4">
                                <h3 class="mb-3 fw-bold text-secondary">مواقع التواصل</h3>
                                <div class="d-flex flex-row justify-content-start align-items-center">
                                    @if ($inventor->inventorProfile->facebook != '')
                                        <a class="btn btn-primary border-0 m-1"
                                            style="background-color: rgb(59, 89, 152);"
                                            href="{{ $inventor->inventorProfile->facebook }}" role="button">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    @endif

                                    @if ($inventor->inventorProfile->twitter != '')
                                        <a class="btn btn-primary border-0 m-1" style="background-color: #55acee;"
                                            href="{{ $inventor->inventorProfile->twitter }}" role="button">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif

                                    @if ($inventor->inventorProfile->instagram != '')
                                        <a class="btn btn-primary border-0 m-1" style="background-color: #ac2bac;"
                                            href="{{ $inventor->inventorProfile->instagram }}" role="button">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    @endif

                                    @if ($inventor->inventorProfile->whatsapp != '')
                                        <a class="btn btn-primary border-0 m-1"
                                            style="background-color: rgb(37, 211, 102);"
                                            href="{{ $inventor->inventorProfile->whatsapp }}" role="button">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- <div class="tab-pane" id="Congresses">
                            <p>
                                it</p>
                        </div>


                        <div class="tab-pane" id="Research">
                            <p>
                                it</p>
                        </div> --}}

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
